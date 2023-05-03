<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbfeedd34c9e4a32e6b32b308320db25c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbfeedd34c9e4a32e6b32b308320db25c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbfeedd34c9e4a32e6b32b308320db25c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbfeedd34c9e4a32e6b32b308320db25c::$classMap;

        }, null, ClassLoader::class);
    }
}