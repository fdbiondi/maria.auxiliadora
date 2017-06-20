<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Traits\Database;
use App\Repositories\Traits\Validator;

abstract class BaseRepository implements RepositoryInterface
{
    use Database, Validator;

    protected $column = "id";
    protected $order = "asc";
    protected $direction = 'asc';

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
    private function newQuery()
    {
        return $this->getModel()->newQuery();
    }

    /**
     * @param string $expression
     * @param array $bindings
     * @return \Illuminate\Database\Query\Builder
     */
    private function selectAll($expression = '*', array $bindings = [])
    {
        return $this->newQuery()->selectRaw($expression, $bindings);
    }

    /**
     * @param string $expression
     * @param $relation
     * @param $has
     * @return \Illuminate\Database\Query\Builder
     */
    private function allBuilder($expression = '*', $relation = false, $has = false)
    {
        $all = $this->all($expression);

        if ($has) {
            $all->has($has);
        }

        if ($relation) {
            $all->with($relation);
        }

        return $all;
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
     * @param $att
     * @param $value
     * @param string|array $relation
     * @param string $expression
     * @param boolean $order
     * @param string $condition
     * @return \Illuminate\Support\Collection
     */
    protected function getBy($att, $value = [], $relation = null, $expression = '*', $order = false, $condition = '=')
    {
        $all = $this->all($expression)
            ->where($att, $condition, $value);

        if (!is_null($relation)) {
            $all->with($relation);
        }

        if ($order) {
            $all->orderBy($this->order, $this->direction);
        }

        return $all->get();
    }

    /**
     * @param $att
     * @param $value
     * @param array $relation
     * @param string $expression
     * @return mixed
     */
    protected function getFirst($att, $value = [], $relation = [], $expression = '*')
    {
        return $this->getBy($att, $value, $relation, $expression)->first();
    }

    /**
     * @param $data
     * @param $errorMessage
     * @param array|null $rules
     * @return mixed
     */
    protected function validateData($data, $errorMessage, Array $rules = null)
    {
        if (is_null($rules)) {
            $rules = $this->getRules();
        }

        $validator = $this->validate($data, $rules);

        if ($validator->fails()) {
            $this->throwValidationException($validator, $errorMessage);
        }

        return $validator;
    }

    /**
     * @param $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     */
    public function findOrFail($id, $columns = ['*'])
    {
        return $this->newQuery()->findOrFail($id, $columns);
    }

    /**
     * @param string $expression
     * @param $relation
     * @param $has
     * @return \Illuminate\Support\Collection
     */
    public function getAll($expression = '*', $relation = false, $has = false)
    {
        return $this->allBuilder($expression, $relation, $has)->get();
    }

    /**
     * @param string $expression
     * @param string|null $order
     * @param string|null $direction
     * @return \Illuminate\Support\Collection
     */
    public function findAllOrder($expression = '*', $order = null, $direction = null)
    {
        return $this->allBuilder($expression)
            ->orderBy(
                is_null($order) ? $this->order : $order,
                is_null($direction) ? $this->direction : $direction
            )->get();
    }
}