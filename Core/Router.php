<?php

namespace Core;

class Router
{
    public array $routes = [];

    public function get(string $uri, string $controller): void
    {
        $this->base($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller): void
    {
        $this->base($uri, $controller, 'POST');
    }

    public function patch(string $uri, string $controller): void
    {
        $this->base($uri, $controller, 'PATCH');
    }

    public function delete(string $uri, string $controller): void
    {
        $this->base($uri, $controller, 'DELETE');
    }

    public function put(string $uri, string $controller): void
    {
        $this->base($uri, $controller, 'PUT');
    }

    public function router($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == $method) {
               return require base_path($route['controller']);
            }
        }

        $this->abort();

    }

    private function base($uri, $controller, $method)
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
}