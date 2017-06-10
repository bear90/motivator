<?php

$sEnvFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'env';

$environment = 'production';
if (file_exists($sEnvFile)) {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
    
    $environment = trim(file_get_contents($sEnvFile));
}

$yiic = '../vendor/yiisoft/yii/framework/yiic.php';

// Include config files
$configMain = require_once(dirname( __FILE__ ) . '/config/console.php');
$config = $configMain;

$configServer       = null;
$serverConfigPath   = dirname( __FILE__ ) . '/config/console.' . $environment . '.php';
if (file_exists($serverConfigPath)) {
    $configServer = require_once($serverConfigPath);
}

require(dirname(__FILE__) . '/../vendor/autoload.php');

if (is_array($configServer)) {
    $config = CMap::mergeArray($configMain, $configServer);
}

//Run application
require_once($yiic);