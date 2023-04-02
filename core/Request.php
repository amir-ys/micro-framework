<?php

namespace Core;

class Request
{
    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function __get($property)
    {
        return $this->params[$property] ?? null;
    }

    public function all(): array
    {
       return  $this->params;
    }

    public function method()
    {
        return $this->method;
    }

    public function get($key)
    {
       return $this->params[$key] ?? null;
    }

    public function isset($key): bool
    {
        return isset($this->params[$key]);
    }
}