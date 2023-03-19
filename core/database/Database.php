<?php


class Database{
    private $conn;
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=php_cms;user=root;charset=utf8';
        $this->conn = new PDO($dsn);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC);
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }
}
