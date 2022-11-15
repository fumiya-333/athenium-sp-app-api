<?php

namespace App\Interfaces\Repositories;

interface MMemberRepositoryInterface
{
    public function insert(array $params);
    public function update(array $params);
    public function updateOrCreate(array $params);
    public function delete(array $wheres);
    public function first(
        array $columns,
        array $wheres,
        array $or_wheres,
        array $group_bys,
        array $havings,
        array $order_bys
    );
    public function get(
        array $columns,
        array $wheres,
        array $or_wheres,
        array $group_bys,
        array $havings,
        array $order_bys
    );
    public function firstWith(
        array $child_tables,
        array $wheres,
        array $or_wheres,
        array $group_bys,
        array $havings,
        array $order_bys
    );
    public function getWith(
        array $child_tables,
        array $wheres,
        array $or_wheres,
        array $group_bys,
        array $havings,
        array $order_bys
    );
    public function exists(array $wheres, array $or_wheres);
    public function count(array $wheres, array $or_wheres, array $group_bys, array $havings);
}
