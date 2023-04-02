<?php

namespace Core\Router;

class Route
{
    public static array $routes = [];

    public static function get(string $uri, array|string $controller): void
    {
        static::add($uri, $controller, 'GET');
    }

    public static function post(string $uri, array|string $controller): void
    {
        static::add($uri, $controller, 'POST');
    }

    public static function patch(string $uri, array|string $controller): void
    {
        static::add($uri, $controller, 'PATCH');
    }

    public static function delete(string $uri, array|string $controller): void
    {
        static::add($uri, $controller, 'DELETE');
    }

    public static function put(string $uri, array|string $controller): void
    {
        static::add($uri, $controller, 'PUT');
    }

    private static function add($uri, array|string $controller, $method)
    {
        static::$routes[] = [
            'uri' => $uri,
            'action' => $controller,
            'method' => $method,
        ];
    }
}