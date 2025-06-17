#!/usr/bin/env php
<?php
require __DIR__ . '/../vendor/autoload.php';

use PhalApi\CLI\Application;
use PhalApi\CLI\Options;

$options = new Options();
$options->setTitle('PhalApi Command Tool');
$options->setVersion('2.0.0');
$options->addRules([
    'v|version'    => '显示版本信息',
    'h|help'        => '显示帮助信息',
]);

$app = new Application();
$app->setOptions($options);
$app->run();
