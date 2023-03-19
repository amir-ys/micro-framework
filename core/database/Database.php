<?php


class Database
{
    private $conn;

    public function __construct()
    {
        $this->connect();
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    private function getDatabaseConfig(): string
    {
        $config = require 'core/config/database.php';
        return http_build_query($config, '', ';');
    }

    private function connect(): void
    {
        $this->conn = new PDO('mysql:' . $this->getDatabaseConfig());
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
}
