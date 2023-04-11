<?php

namespace Core\Router;


use Core\App;
use Core\Request;

class Router
{
    protected array $routes;
    private mixed $current_uri;
    private Request $request;
    private mixed $route_uri;
    public function __construct()
    {
        $this->routes = Route::$routes;
        $this->request = new Request();
        $this->current_uri = $this->findCurrentUri();
    }

    public function findCurrentUri()
    {
        $currentRoute = null;
        foreach ($this->routes as $route) {
            if ($route['uri'] == $this->request->uri()) {
                $this->route_uri = $route['uri'];
                if ($route['method'] == $this->request->method()) {
                    $currentRoute = $route;
                }
            }
        }

        if (empty($this->route_uri)) {
            throw new \Exception("The requested URL was not found on this server.");
        }

        return $currentRoute;
    }


    public function run()
    {
        //check route method
        if (!isset($this->current_uri['method']) || ($this->current_uri['method'] != $this->request->method())) {
            throw new \Exception(
                sprintf(
                    'the %s method is not supported for route %s',
                    $this->request->method(),
                    $this->route_uri ?? null,
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

        $classObj = new $classPath($GLOBALS["request"]);
        $res = $classObj->$method($GLOBALS["request"]);

        if (is_array($res)) {
            return json_encode($res);
        }

        return $res;
    }

}