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

    public function create()
    {

    }

    public function update($id, $data)
    {

    }

    public function delete($id)
    {

    }
}