<?php

namespace App\Repositories;

abstract class BaseRepository 
{
    protected $column = "name";
    protected $order = "asc";

    /**
     * @return \App\Entities\Entity
     */
    abstract public function getModel();
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return $this->getModel()->newQuery();
    }

    /**
     * @param $id
     * @param array $relation
     * @return \App\Entities\Entity
     */
    public function findOrFail($id, $relation = [])
    {
        return $this->newQuery()->with($relation)->findOrFail($id);
    }
    
    public function findBy($att, $condition, $value, $relation= [])
    {
        return $this->getModel()
            ->where($att, $condition, $value)
            ->with($relation)
            ->get();
    }

    protected function selectAll($columns = '*')
    {
        return $this->newQuery()
            ->selectRaw($columns)
            ->orderBy($this->column, $this->order);
    }
    
    public function getAll($columns = '*')
    {
        return $this->selectAll($columns)->get();
    }
}