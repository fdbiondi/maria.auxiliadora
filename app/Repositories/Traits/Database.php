<?php

namespace App\Repositories\Traits;

use Illuminate\Support\Facades\DB;

trait Database
{
    public function beginTransaction()
    {
        DB::beginTransaction();
    }

    public function commit()
    {
        DB::commit();
    }

    public function rollback()
    {
        DB::rollback();
    }

    /**
     * @param string $value
     * @return \Illuminate\Database\Query\Expression
     */
    public function query($value)
    {
        return DB::raw($value);
    }

    /**
     * @param \Illuminate\Database\Query\Expression $query
     * @param array $bindings
     * @return array|mixed
     */
    public function select($query, $bindings = [])
    {
        return DB::select($query, $bindings);
    }

}