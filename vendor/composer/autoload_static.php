<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbd26eb65843acbd4404f21f2835d5c06
{
    public static $prefixLengthsPsr4 = array (
        'v' => 
        array (
            'vBulletin\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'vBulletin\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitbd26eb65843acbd4404f21f2835d5c06::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbd26eb65843acbd4404f21f2835d5c06::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbd26eb65843acbd4404f21f2835d5c06::$classMap;

        }, null, ClassLoader::class);
    }
}
