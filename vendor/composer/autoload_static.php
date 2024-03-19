<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2e94ba63b54c54c244ed90b333fa7863
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Router' => __DIR__ . '/../..' . '/app/Router.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2e94ba63b54c54c244ed90b333fa7863::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2e94ba63b54c54c244ed90b333fa7863::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2e94ba63b54c54c244ed90b333fa7863::$classMap;

        }, null, ClassLoader::class);
    }
}