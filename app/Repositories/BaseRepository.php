<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

abstract class BaseRepository 
{
    protected $column = "name";
    protected $order = "asc";

    /**
     * @return \App\Entities\Entity
     */
    abstract public function getModel();

    /**
     * @return array
     */
    abstract protected function getRules();

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return $this->getModel()->newQuery();
    }

    protected function beginTransaction()
    {
        DB::beginTransaction();
    }

    protected function commit()
    {
        DB::commit();
    }

    protected function rollback()
    {
        DB::rollback();
    }

    /**
     * @param string $expression
     * @param array $bindings
     * @return \Illuminate\Database\Query\Builder
     */
    private function selectAll($expression = '*', array $bindings = [])
    {
        return $this->newQuery()->selectRaw($expression, $bindings);//->orderBy($this->column, $this->order);
    }

    /**
     * @param string $value
     * @return \Illuminate\Database\Query\Expression
     */
    protected function query($value)
    {
        return DB::raw($value);
    }

    /**
     * @param \Illuminate\Database\Query\Expression $query
     * @param array $bindings
     * @return array|mixed
     */
    protected function select($query, $bindings = [])
    {
        return DB::select($query, $bindings);
    }

    /**
     * @param string $expression
     * @param array $bindings
     * @return \Illuminate\Database\Query\Builder
     */
    protected function all($expression = '*', array $bindings = [])
    {
        return $this->selectAll($expression, $bindings);
    }

    /**
     * @param $id
     * @param array $relation
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findOrFail($id, $relation = [], $columns = ['*'])
    {
        return $this->newQuery()->with($relation)->findOrFail($id, $columns);
    }

    /**
     * @param string $expression
     * @param $relation
     * @param $has
     * @return \Illuminate\Support\Collection
     */
    public function getAll($expression = '*', $relation = false, $has = false)
    {
        $all = $this->all($expression);

        if ($has) {
            $all->has($has);
        }

        if ($relation) {
            $all->with($relation);
        }

        return $all->get();
    }

    /**
     * @param string $expression
     * @param null $order
     * @param null $direction
     * @return \Illuminate\Support\Collection
     */
    public function getAllOrder($expression = '*', $order = null, $direction = null)
    {
        return $this->all($expression)
            ->orderBy(
                isset($order) ? $order : $this->order,
                isset($direction) ? $direction :$this->direction
            )->get();
    }

    /**
     * @param $att
     * @param $condition
     * @param $value
     * @param array $relation
     * @param string $expression
     * @return \Illuminate\Support\Collection
     */
    protected function getBy($att, $value, $condition, $relation = [], $expression = '*')
    {
        return $this->all($expression)
            ->where($att, $condition, $value)
            ->with($relation)
            ->get();
    }

    /**
     * @param $att
     * @param $value
     * @param array $relation
     * @param string $columns
     * @return mixed
     */
    public function getOne($att, $value = [], $relation = [], $columns = '*')
    {
        return $this->getBy($att, $value, '=', $relation, $columns)->first();
    }

    /**
     * @param $attributes
     * @param $rules
     * @return mixed
     */
    public function validate($attributes, $rules)
    {
        return Validator::make($attributes, $rules);
    }

    /**
     * @param $data
     * @param $errorMessage
     * @param array|null $rules
     * @throws StoreResourceFailedException
     * @return mixed
     */
    protected function validateData($data, $errorMessage, Array $rules = null)
    {
        if (is_null($rules)) {
            $rules = $this->getRules();
        }

        $validator = $this->validate($data, $rules);

        if ($validator->fails()) {
            throw new StoreResourceFailedException($errorMessage, $validator->errors());
        }

        return $validator;
    }
}