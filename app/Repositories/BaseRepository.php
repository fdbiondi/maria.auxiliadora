<?php

namespace App\Repositories;

abstract class BaseRepository 
{
    protected $column = "name";

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
     * @param integer $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findOrFail($id)
    {
        return $this->newQuery()->findOrFail($id);
    }

    public function findBy($att, $condition, $column, $relation= [])
    {
        return $this->getModel()
            ->where($att, $condition, $column)
            ->with($relation)
            ->get();
    }

    protected function selectAll($columns = '*')
    {
        return $this->newQuery()
            ->selectRaw($columns)
            ->orderBy($this->column);
    }
    
    public function getAll($columns = '*')
    {
        return $this->selectAll($columns)->get();
    }

    public function getAllWith($relation)
    {
        return $this->selectAll()->with($relation)->get();
    }

    public function getById($id, $columns = ['*'])
    {
        return $this->getModel()->find($id, $columns);
    }
}