<?php
namespace App\Api;

use PhalApi\Api;
use App\Domain\Qiniu as QiniuDomain;

class QiniuDemo extends Api
{
    public function getRules()
    {
        return [
            'upload' => [
                'file' => [
                    'name' => 'file', 
                    'type' => 'file', 
                    'require' => true,
                    'max' => 1024 * 1024 * 10, // 10MB
                    'ext' => 'jpg,png,gif'
                ]
            ],
            'getToken' => [
                'key' => ['name' => 'key', 'type' => 'string', 'require' => true]
            ]
        ];
    }

    public function upload()
    {
        $tmpFile = $this->file['tmp_name'];
        $fileName = $this->file['name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        
        $saveKey = 'uploads/' . date('Ymd') . '/' . uniqid() . '.' . $ext;
        
        $domain = new QiniuDomain();
        return [
            'url' => $domain->uploadFile($tmpFile, $saveKey)
        ];
    }

    public function getToken()
    {
        $domain = new QiniuDomain();
        return $domain->generateUploadToken($this->key);
    }
    
    public function test()
    {
        return [
            'message' => 'PhalApi + Qiniu Docker 已成功运行！',
            'timestamp' => time()
        ];
    }
}
