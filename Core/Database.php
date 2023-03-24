<?php

namespace Core;
use PDO;

class Database
{
    protected $conn;
    private $statement;

    public function __construct(private $config)
    {
        $this->connect();
    }

    public function query($sql, $parameters = [])
    {
        $this->statement = $this->conn->prepare($sql);
        $this->statement->execute($parameters);
        return $this;
    }

    public function find()
    {
       return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->statement->fetch();
        if (empty($result)){
            abort();
        }
        return $result;

    }

    public function get()
    {
        return $this->statement->fetchAll();
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
}