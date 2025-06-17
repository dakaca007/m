<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use PhalApi\PhalApi;

try {
    $api = new PhalApi();
    $response = $api->response();
    $response->output();
} catch (\Exception $e) {
    echo json_encode([
        'ret' => 500,
        'msg' => $e->getMessage(),
        'data' => new stdClass(),
    ]);
}
