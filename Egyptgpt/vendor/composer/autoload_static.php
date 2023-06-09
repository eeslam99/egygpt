<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit695e0d847801174ddacf4945f7ad80f8
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Orhanerday\\OpenAi\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Orhanerday\\OpenAi\\' => 
        array (
            0 => __DIR__ . '/..' . '/orhanerday/open-ai/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit695e0d847801174ddacf4945f7ad80f8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit695e0d847801174ddacf4945f7ad80f8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit695e0d847801174ddacf4945f7ad80f8::$classMap;

        }, null, ClassLoader::class);
    }
}
