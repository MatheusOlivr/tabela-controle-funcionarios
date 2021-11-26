<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7efe2922b50a528948764326550ed54d
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Matheusolivr\\TabelaControleFuncionario\\' => 39,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Matheusolivr\\TabelaControleFuncionario\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7efe2922b50a528948764326550ed54d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7efe2922b50a528948764326550ed54d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit7efe2922b50a528948764326550ed54d::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit7efe2922b50a528948764326550ed54d::$classMap;

        }, null, ClassLoader::class);
    }
}
