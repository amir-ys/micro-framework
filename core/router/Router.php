<?php

namespace Core\Router;


use Core\App;
use Core\Request;

class Router
{
    protected array $routes;
    private $current_uri;
    private Request $request;

    public function __construct()
    {
        $this->routes = Route::$routes;
        $this->request = new Request();
        $this->current_uri = $this->findCurrentUri();
    }

    public function findCurrentUri()
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $this->request->uri() && $route['method'] == $this->request->method()) {
                return $route;
            }
        }
        return null;
    }

    public function run()
    {
        //check route method
        if ($this->current_uri['method'] != $this->request->method()) {
            throw new \Exception(
                sprintf('the %s method is not supported for route %s. Supported methods: %s',
                    $this->request->method(), $this->current_uri['uri'], $this->current_uri['method']
                ));
        }

        // when action in closure
        if ($this->current_uri['action'] instanceof \Closure) {
            $this->current_uri['action']();
        }

        //controller with format "Controller@index"
        if (is_string($this->current_uri['action'])) {
            $action = explode('@', $this->current_uri['action']);
            $classPath = App::resolve('config.app')['controller_path'] . $action[0];
            $method = $action[1];
            return $this->loadController($classPath, $method);
        }

        //controller with format [ Controller::class ,"index"]
        if (is_array($this->current_uri['action'])) {
            return $this->loadController($this->current_uri['action'][0], $this->current_uri['action'][1]);
        }
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