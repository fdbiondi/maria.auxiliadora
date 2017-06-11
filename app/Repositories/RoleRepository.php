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

    /**
     * @return array
     */
    protected function getRules()
    {
        return [];
    }
}