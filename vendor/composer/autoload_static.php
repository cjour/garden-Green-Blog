<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1213d65142fa7d0eaf7afc41cfb0b57b
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Blog\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Blog\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
    );

    public static $classMap = array (
        'Blog\\CommentManager' => __DIR__ . '/../..' . '/model/CommentManager.php',
        'Blog\\ConnectionManager' => __DIR__ . '/../..' . '/model/ConnectionManager.php',
        'Blog\\Manager' => __DIR__ . '/../..' . '/model/Manager.php',
        'Blog\\PostManager' => __DIR__ . '/../..' . '/model/PostManager.php',
        'Blog\\ProfilManager' => __DIR__ . '/../..' . '/model/ProfilManager.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1213d65142fa7d0eaf7afc41cfb0b57b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1213d65142fa7d0eaf7afc41cfb0b57b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1213d65142fa7d0eaf7afc41cfb0b57b::$classMap;

        }, null, ClassLoader::class);
    }
}
