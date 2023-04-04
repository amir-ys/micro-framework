<?php

namespace App\Models;

use Core\App;
use Core\Database\QueryBuilder;

class BaseModel
{
    protected string $primaryKey = 'id';
    protected $table;
    private QueryBuilder $queryBuilder;

    public function __construct()
    {
        if (is_null($this->table)) {
            throw new \Exception('table doest not exists');
        }
        $this->queryBuilder = App::resolve(QueryBuilder::class);
    }


    public function all()
    {
        return $this->queryBuilder->all($this->table);
    }

    public function find($field, $findBy)
    {
        return $this->queryBuilder->find($this->table, $field, $findBy);
    }

    public function findOrFail($field, $findBy = 'id')
    {
        return $this->queryBuilder->findOrFail($this->table, $field, $findBy);
    }

    public function create($values)
    {
        return $this->queryBuilder->create($this->table, $values);
    }

    public function update($field, $values, $findBy = 'id')
    {
        return $this->queryBuilder->update($this->table, $field, $values, $findBy);
    }

    public function delete($field, $findBy = 'id')
    {
        return $this->queryBuilder->delete($this->table, $field, $findBy);
    }

    public function where($field, $value)
    {
        return $this->queryBuilder->where($this->table, $field, $value);
    }

    public function first()
    {
        return $this->queryBuilder->first();
    }

}