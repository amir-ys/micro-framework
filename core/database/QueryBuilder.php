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

    public function find($table, $value, $field = 'id')
    {
        return $this->findQuery($table, $field, $value);
    }

    public function findOrFail($table, $value, $field = 'id')
    {
        $result = $this->findQuery($table, $field, $value);
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

    public function update(string $table, string $id, array $params, string $field = 'id'): bool
    {
        $newFormattedParams = [];
        foreach ($params as $key => $value) {
            $newFormattedParams[] = "$key=:$key";
        }

        $this->statment = $this->pdo->prepare(sprintf("update %s set %s where $field = %s",
            $table,
            implode(' ,', $newFormattedParams),
            ":$field"
        ));

        $params = array_merge($params, ['id' => $id]);

        return $this->statment->execute($params);
    }

    public function delete($table, $value, $field = 'id'): mixed
    {
        $this->statment = $this->pdo->prepare(sprintf("delete from %s where %s = %s", $table, $field, ":$field"));
        return $this->statment->execute(["$field" => $value]);
    }

    public function findQuery($table, mixed $field, $value): mixed
    {
        $this->statment = $this->pdo->prepare(sprintf("select * from %s  where %s = %s", $table, $field, ":$field"));
        $this->statment->execute(["$field" => $value]);
        return $this->statment->fetch();
    }

}
