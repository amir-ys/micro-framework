<?php

namespace Core;

class Router
{
    public array $routes = [];

    public function get(string $uri, array|string $controller): void
    {
        $this->base($uri, $controller, 'GET');
    }

    public function post(string $uri, array|string $controller): void
    {
        $this->base($uri, $controller, 'POST');
    }

    public function patch(string $uri, array|string $controller): void
    {
        $this->base($uri, $controller, 'PATCH');
    }

    public function delete(string $uri, array|string $controller): void
    {
        $this->base($uri, $controller, 'DELETE');
    }

    public function put(string $uri, array|string $controller): void
    {
        $this->base($uri, $controller, 'PUT');
    }

    private function base($uri, array|string $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];
    }

    private function abort(): void
    {
        abort(Response::NOT_FOUND);
    }

    public function router($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == $method) {
                if (is_array($route['controller'])) {
                    return $this->loadController($route['controller'][0], $route['controller'][1]);
                } else {
                    $action = explode('@', $route['controller']);
                    $classPath = App::resolve('config.app')['controller_path'] . $action[0];
                    $method = $action[1];
                    return $this->loadController($classPath, $method);
                }
            }
        }

        $this->abort();

    }

    private function loadController($classPath, $method)
    {
        if (!class_exists($classPath)) {
            throw new \Exception("target class $classPath does not exists");
        }

        if (!method_exists($classPath, $method)) {
            throw new \Exception("method $method not found in  $classPath class");
        }

        $classObj = new $classPath();
        return $classObj->$method();
    }
}