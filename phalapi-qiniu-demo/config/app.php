<?php
return array(
    'debug' => true,
    'response' => [
        'format' => 'json',
        'json_encode_options' => JSON_UNESCAPED_UNICODE,
    ],
    'namespaces' => [
        'App' => dirname(__FILE__) . '/../app',
    ],
    'routes' => [
        'default' => ['namespace' => 'App\\Api'],
    ],
);
