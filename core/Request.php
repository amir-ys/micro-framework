<?php

namespace Core;

class Request
{
    private array $params;
    private mixed $user_agent;
    private mixed $method;
    private mixed $uri;
    private mixed $ip;

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    public function __get($property)
    {
        return $this->params[$property] ?? null;
    }

    public function all(): array
    {
        return $this->params;
    }

    public function method()
    {
        return isset($_POST['_method']) ?: $this->method;
    }

    public function get($key)
    {
        return $this->params[$key] ?? null;
    }

    public function isset($key): bool
    {
        return isset($this->params[$key]);
    }

    public function ip()
    {
        return $this->ip();
    }

    public function uri()
    {
        return parse_url($this->uri)['path'];
    }

    public function isApi()
    {
       return str_starts_with( ltrim($this->uri(), '/') ,  'api');
    }
}