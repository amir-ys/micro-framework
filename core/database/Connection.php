<?php

namespace Core\Database;

use PDO;

class Connection
{
    private static $instance;
    private $conn;

    private function __construct(private $config)
    {
        $this->connect();
    }

    private function __clone()
    {
        //
    }

    public static function getInstance($config): Connection
    {
        if (is_null(static::$instance)) {
            return new static($config);
        }
        return static::$instance;
    }

    private function getDatabaseConfig(): string
    {
        return http_build_query($this->config, '', ';');
    }

    private function connect(): void
    {
        $this->conn = new PDO('mysql:' . $this->getDatabaseConfig());
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    public function getConnect()
    {
        return $this->conn;
    }
}
