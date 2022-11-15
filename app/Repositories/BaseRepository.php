<?php
namespace App\Repositories;

class BaseRepository
{
    /** キー */
    const KEY = 'key';
    /** 判定 */
    const JUDGE = 'judge';
    /** 値 */
    const VALUE = 'value';

    protected function setJudge(
        &$query,
        array $wheres = [],
        array $or_wheres = [],
        array $where_betweens = [],
        array $where_raws = [],
        array $group_bys = [],
        array $havings = [],
        array $order_bys = []
    ) {
        foreach ($wheres as $where) {
            $query = $query->where($where[self::KEY], $where[self::JUDGE], $where[self::VALUE]);
        }

        foreach ($or_wheres as $or_where) {
            $query = $query->orWhere($or_where[self::KEY], $or_where[self::JUDGE], $or_where[self::VALUE]);
        }

        foreach ($where_betweens as $key => $value) {
            $query = $query->whereBetween($key, $value);
        }

        foreach ($where_raws as $value) {
            $query = $query->whereRaw($value);
        }

        if (is_array($group_bys) && count($group_bys)) {
            $query = $query->groupBy($group_bys);
        }

        foreach ($havings as $having) {
            $query = $query->having($having[self::KEY], $having[self::JUDGE], $having[self::VALUE]);
        }

        foreach ($order_bys as $order_by) {
            $query = $query->orderBy($order_by[self::KEY], $order_by[self::VALUE]);
        }
    }
}
