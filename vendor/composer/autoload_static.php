<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b902be354650e1a095dc5c69ccfd352
{
    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit0b902be354650e1a095dc5c69ccfd352::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
