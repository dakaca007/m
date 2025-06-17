<?php
namespace App\Domain;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Config;
use PhalApi\Exception\BadRequestException;

class Qiniu
{
    protected function getConfig()
    {
        return \PhalApi\DI()->config->get('qiniu');
    }

    /**
     * 上传本地文件到七牛云
     */
    public function uploadFile($localFilePath, $saveKey)
    {
        $config = $this->getConfig();
        $auth = new Auth($config['accessKey'], $config['secretKey']);
        
        // 根据区域获取对应的Zone配置
        $zone = $this->getZone($config['region']);
        $uploadMgr = new UploadManager(new Config($zone));
        
        // 生成上传Token
        $token = $auth->uploadToken($config['space_bucket'], $saveKey);
        
        // 上传文件
        list($result, $error) = $uploadMgr->putFile($token, $saveKey, $localFilePath);
        
        if ($error !== null) {
            \PhalApi\DI()->logger->error('七牛上传失败', $error);
            throw new BadRequestException('上传失败: ' . $error->message());
        }
        
        return $config['space_host'] . '/' . $saveKey;
    }

    /**
     * 生成上传凭证
     */
    public function generateUploadToken($saveKey = null, $expires = 3600)
    {
        $config = $this->getConfig();
        $auth = new Auth($config['accessKey'], $config['secretKey']);
        $zone = $this->getZone($config['region']);
        
        return [
            'token' => $auth->uploadToken($config['space_bucket'], $saveKey, $expires),
            'uploadUrl' => $zone->getUpHost($config['accessKey'], $config['space_bucket'])
        ];
    }

    /**
     * 根据区域代号获取Zone配置
     */
    private function getZone($region)
    {
        $zones = [
            'z0' => \Qiniu\Zone::zone0(), // 华东
            'z1' => \Qiniu\Zone::zone1(), // 华北
            'z2' => \Qiniu\Zone::zone2(), // 华南
            'na0' => \Qiniu\Zone::zoneNa0(), // 北美
            'as0' => \Qiniu\Zone::zoneAs0(), // 东南亚
        ];
        
        return $zones[$region] ?? \Qiniu\Zone::zone0();
    }
}
