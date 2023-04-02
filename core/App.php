<?php

namespace Core;

class App
{
    protected static $container;

    public static function setContainer($key): void
    {
        static::$container = $key;
    }

    public static function container()
    {
        return static::$container;
    }

    public static function resolve($key)
    {
       return static::container()->resolve($key);
    }

    public static function bind($key, $resolver)
    {
       return static::container()->bind($key, $resolver);
    }

}