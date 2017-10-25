<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcf0f6daba1f6ad8ecc8915533834db05
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcf0f6daba1f6ad8ecc8915533834db05::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcf0f6daba1f6ad8ecc8915533834db05::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}