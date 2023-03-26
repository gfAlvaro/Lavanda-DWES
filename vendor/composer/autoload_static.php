<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c0b547e14b224f9224fe2e47ac843be
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Models\\' => 11,
            'App\\Core\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Models',
        ),
        'App\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4c0b547e14b224f9224fe2e47ac843be::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4c0b547e14b224f9224fe2e47ac843be::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4c0b547e14b224f9224fe2e47ac843be::$classMap;

        }, null, ClassLoader::class);
    }
}