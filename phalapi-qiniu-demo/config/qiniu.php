<?php
return array(
    'accessKey' => getenv('QINIU_ACCESS_KEY') ?: 'your_access_key',
    'secretKey' => getenv('QINIU_SECRET_KEY') ?: 'your_secret_key',
    'space_bucket' => getenv('QINIU_BUCKET') ?: 'your_bucket_name',
    'space_host' => getenv('QINIU_DOMAIN') ?: 'https://your.cdn.domain',
    'uphost' => getenv('QINIU_UPLOAD_HOST') ?: 'https://up.region.qiniup.com',
    'region' => getenv('QINIU_REGION') ?: 'z0'
);
