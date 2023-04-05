<?php

namespace App\Models;

use Core\App;
use Core\Database\QueryBuilder;

class BaseModel
{
    protected static string $primaryKey = 'id';
    protected static $table;

    public function __construct()
    {
        if (is_null(static::$table)) {
            throw new \Exception('table doest not exists');
        }
    }


    public static function all()
    {
        return App::resolve(QueryBuilder::class)->all(static::$table);
    }

    public static function find($field, $findBy)
    {
        return App::resolve(QueryBuilder::class)->find(static::$table, $field, $findBy);
    }

    public static function findOrFail($field, $findBy = 'id')
    {
        return App::resolve(QueryBuilder::class)->findOrFail(static::$table, $field, $findBy);
    }

    public static function create($values)
    {
        return App::resolve(QueryBuilder::class)->create(static::$table, $values);
    }

    public static function update($field, $values, $findBy = 'id')
    {
        return App::resolve(QueryBuilder::class)->update(static::$table, $field, $values, $findBy);
    }

    public static function delete($field, $findBy = 'id')
    {
        return App::resolve(QueryBuilder::class)->delete(static::$table, $field, $findBy);
    }

    public static function where($field, $value)
    {
        return App::resolve(QueryBuilder::class)->where(static::$table, $field, $value);
    }

    public static function first()
    {
        return App::resolve(QueryBuilder::class)->first();
    }

}