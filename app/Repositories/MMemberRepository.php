<?php

namespace App\Repositories;

use App\Interfaces\Repositories\MMemberRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\MMember;

class MMemberRepository extends BaseRepository implements MMemberRepositoryInterface
{
    public function insert(array $params)
    {
        return MMember::insert($params);
    }

    public function update(array $params)
    {
        return MMember::update($params);
    }

    public function updateOrCreate(array $params)
    {
        return MMember::updateOrCreate(
            [
                MMember::COL_M_MEMBER_ID => $params[MMember::COL_M_MEMBER_ID],
                MMember::COL_DEL_FLG => $params[MMember::COL_DEL_FLG],
            ],
            $params
        );
    }

    public function delete(array $wheres)
    {
        $query = new MMember();
        self::setJudge($query, $wheres);
        return $query->delete();
    }

    public function first(
        array $columns,
        array $wheres = [],
        array $or_wheres = [],
        array $where_betweens = [],
        array $where_raws = [],
        array $group_bys = [],
        array $havings = [],
        array $order_bys = []
    ) {
        $query = MMember::select($columns);
        self::setJudge($query, $wheres, $or_wheres, $where_betweens, $where_raws, $group_bys, $havings, $order_bys);
        return $query->first();
    }

    public function get(
        array $columns,
        array $wheres = [],
        array $or_wheres = [],
        array $where_betweens = [],
        array $where_raws = [],
        array $group_bys = [],
        array $havings = [],
        array $order_bys = []
    ) {
        $query = MMember::select($columns);
        self::setJudge($query, $wheres, $or_wheres, $where_betweens, $where_raws, $group_bys, $havings, $order_bys);
        return $query->get();
    }

    public function firstWith(
        array $child_tables,
        array $wheres = [],
        array $or_wheres = [],
        array $where_betweens = [],
        array $where_raws = [],
        array $group_bys = [],
        array $havings = [],
        array $order_bys = []
    ) {
        $query = MMember::with($child_tables);
        self::setJudge($query, $wheres, $or_wheres, $where_betweens, $where_raws, $group_bys, $havings, $order_bys);
        return $query->first();
    }

    public function getWith(
        array $child_tables,
        array $wheres = [],
        array $or_wheres = [],
        array $where_betweens = [],
        array $where_raws = [],
        array $group_bys = [],
        array $havings = [],
        array $order_bys = []
    ) {
        $query = MMember::with($child_tables);
        self::setJudge($query, $wheres, $or_wheres, $where_betweens, $where_raws, $group_bys, $havings, $order_bys);
        return $query->get();
    }

    public function exists(
        array $wheres = [],
        array $or_wheres = [],
        array $where_betweens = [],
        array $where_raws = []
    ) {
        $query = new MMember();
        self::setJudge($query, $wheres, $or_wheres, $where_betweens, $where_raws);
        return $query->exists();
    }

    public function count(
        array $wheres = [],
        array $or_wheres = [],
        array $where_betweens = [],
        array $where_raws = [],
        array $group_bys = [],
        array $havings = []
    ) {
        $query = new MMember();
        self::setJudge($query, $wheres, $or_wheres, $where_betweens, $where_raws, $group_bys, $havings);
        return $query->count();
    }
}
