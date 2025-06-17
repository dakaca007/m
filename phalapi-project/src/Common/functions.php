<?php
// 该文件包含一些公共函数，供项目中的其他文件调用。

function response($data, $status = 200) {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

function validateInput($input, $rules) {
    foreach ($rules as $field => $rule) {
        if (!isset($input[$field]) || !preg_match($rule, $input[$field])) {
            return false;
        }
    }
    return true;
}

function logMessage($message) {
    $logFile = __DIR__ . '/../../logs/app.log';
    file_put_contents($logFile, date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL, FILE_APPEND);
}
?>