<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc6d64d4af2272417ea123a677232f0ee
{
    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Test' => 
            array (
                0 => __DIR__ . '/../..' . '/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitc6d64d4af2272417ea123a677232f0ee::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}