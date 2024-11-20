<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3745afec265f720a9fb3e7e953bc08f1
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
        'App\\Config' => __DIR__ . '/../..' . '/app/Config.php',
        'App\\SQLiteConnection' => __DIR__ . '/../..' . '/app/SQLiteConnection.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3745afec265f720a9fb3e7e953bc08f1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3745afec265f720a9fb3e7e953bc08f1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3745afec265f720a9fb3e7e953bc08f1::$classMap;

        }, null, ClassLoader::class);
    }
}
