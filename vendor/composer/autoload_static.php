<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1272099bda7b7aeaeb654b492d311c2d
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1272099bda7b7aeaeb654b492d311c2d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1272099bda7b7aeaeb654b492d311c2d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1272099bda7b7aeaeb654b492d311c2d::$classMap;

        }, null, ClassLoader::class);
    }
}
