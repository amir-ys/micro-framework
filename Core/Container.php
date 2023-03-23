<?php

namespace Core;

use mysql_xdevapi\Exception;

class Container
{
    public array $bindings = [];

    public function bind($key, $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("not matching binding for key $key");
        }

       return call_user_func($this->bindings[$key]);
    }
}