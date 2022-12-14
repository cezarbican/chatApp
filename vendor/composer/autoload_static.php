<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita49ed94aaa00f9bc2b4e609315e5d573
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chatapp\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chatapp\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita49ed94aaa00f9bc2b4e609315e5d573::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita49ed94aaa00f9bc2b4e609315e5d573::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita49ed94aaa00f9bc2b4e609315e5d573::$classMap;

        }, null, ClassLoader::class);
    }
}
