<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdc7cc49587861f2353ff4dea68abba4d
{
    public static $classMap = array (
        'Yii' => __DIR__ . '/..' . '/yiisoft/yii/framework/yii.php',
        'YiiBase' => __DIR__ . '/..' . '/yiisoft/yii/framework/YiiBase.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitdc7cc49587861f2353ff4dea68abba4d::$classMap;

        }, null, ClassLoader::class);
    }
}