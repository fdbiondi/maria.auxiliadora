<?php

namespace App\Repositories;

use App\Entities\Plan;

class PlanRepository extends BaseRepository
{
    protected $table = "plans";
    protected $column = "name";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new Plan();
    }

    /**
     * @return array
     */
    protected function getRules()
    {
        return [];
    }

    public function create(Array $data)
    {
        return $this->getModel()->create([
            'name' => $data['name'],
            'date' => $data['date'],
            'code' => $data['code'],
            'current' => $data['current'],
            'level_id' => $data['level_id'],
        ]);
    }
}