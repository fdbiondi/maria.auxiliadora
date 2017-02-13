<?php

namespace App\Repositories;

use App\Entities\Role;

class RoleRepository extends BaseRepository
{
    protected $table = "roles";
    protected $column = "name";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new Role();
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