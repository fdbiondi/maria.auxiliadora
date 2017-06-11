<?php

namespace App\Repositories;

use App\Entities\Level;

class LevelRepository extends BaseRepository
{
    protected $table = "levels";
    protected $column = "name";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new Level();
    }

    /**
     * @return array
     */
    protected function getRules()
    {
        return [];
    }

}