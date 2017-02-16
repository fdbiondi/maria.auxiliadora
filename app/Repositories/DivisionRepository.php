<?php

namespace App\Repositories;

use App\Entities\Division;

class DivisionRepository extends BaseRepository
{
    protected $table = "divisions";
    protected $column = "name";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new Division();
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