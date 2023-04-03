<?php

namespace App\Models;

use Core\App;
use Core\Database\QueryBuilder;

class BaseModel
{
    protected string $primaryKey = 'id';
    protected  $table;
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

    public function find($id)
    {
        return $this->queryBuilder->find($this->table, $id);
    }

    public function findOrFail($id, $findBy = 'id')
    {
        return $this->queryBuilder->findOrFail($this->table, $id, $findBy);
    }

    public function create($values)
    {
        return $this->queryBuilder->create($this->table, $values);
    }

    public function update($id, $values, $findBy = 'id')
    {
        return $this->queryBuilder->update($this->table, $id, $values, $findBy);
    }

    public function delete($id, $findBy = 'id')
    {
        return $this->queryBuilder->delete($this->table, $id, $findBy);
    }

}