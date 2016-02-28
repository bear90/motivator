<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$sEnvFile = dirname(__FILE__)  . DIRECTORY_SEPARATOR . 'env';

$environment = 'production';
if (file_exists($sEnvFile)) {

    $environment = trim(file_get_contents($sEnvFile));
}

if ( !in_array($environment, [/*'production', */'dev']) )
{
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
}

$yii=dirname(__FILE__).'/../../frameworks/yii/framework/yii.php';

// Include config files
$configMain = require_once(dirname( __FILE__ ) . '/protected/config/main.php');
$config = $configMain;

$configServer = null;
$serverConfigPath = dirname( __FILE__ ) . '/protected/config/server.' . $environment . '.php';

if (file_exists($serverConfigPath)) {
    $configServer = require_once(dirname( __FILE__ ) . '/protected/config/server.' . $environment . '.php');

    if (!empty($configServer['params']['yiiPath'])) {
        $yii = $configServer['params']['yiiPath'];
        unset($configServer['params']['yiiPath']);
    }
}

//Run application
require_once($yii);

if (is_array($configServer)) {
    $config = CMap::mergeArray($configMain, $configServer);
}

Yii::createWebApplication($config)->run();
