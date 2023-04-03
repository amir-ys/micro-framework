<?php

namespace Core\Database;

class QueryBuilder
{
    private \PDO $pdo;
    private $statment;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function all($table)
    {
        $this->statment = $this->pdo->prepare(sprintf("select * from %s", $table));
        $this->statment->execute();
        return $this->statment;
    }

    public function find($table, $value, $findBy = 'id')
    {
        return $this->findQuery($table, $findBy, $value);
    }

    public function findOrFail($table, $value, $findBy = 'id')
    {
        $result = $this->findQuery($table, $findBy, $value);
        if (!$result) {
            abort();
        }
        return $result;
    }

    public function create(string $table, array $params): bool
    {
        $this->statment = $this->pdo->prepare(sprintf("insert into %s(%s) values(%s)",
            $table,
            implode(' ,', array_keys($params)),
            ':' . implode(', :', array_keys($params))));

        return $this->statment->execute($params);
    }

    public function update(string $table, string $id, array $params, string $findBy = 'id'): bool
    {
        $newFormattedParams = [];
        foreach ($params as $key => $value) {
            $newFormattedParams[] = "$key=:$key";
        }

        $this->statment = $this->pdo->prepare(sprintf("update %s set %s where $findBy = %s",
            $table,
            implode(' ,', $newFormattedParams),
            ":$findBy"
        ));

        $params = array_merge($params, ['id' => $id]);

        return $this->statment->execute($params);
    }

    public function delete($table, $value, $findBy = 'id'): mixed
    {
        $this->statment = $this->pdo->prepare(sprintf("delete from %s where %s = %s", $table, $findBy, ":$findBy"));
        return $this->statment->execute(["$findBy" => $value]);
    }

    private function findQuery($table, mixed $field, $value): mixed
    {
        $this->statment = $this->pdo->prepare(sprintf("select * from %s  where %s = %s", $table, $field, ":$field"));
        $this->statment->execute(["$field" => $value]);
        return $this->statment->fetch();
    }

}
