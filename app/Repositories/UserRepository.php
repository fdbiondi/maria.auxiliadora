<?php

namespace App\Repositories;

use App\Entities\User;

class UserRepository extends BaseRepository
{
    protected $table = "users";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new User();
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