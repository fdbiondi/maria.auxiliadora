<?php

namespace App\Entities;

class Role extends Entity
{
    public function users() {
        return $this->hasMany(User::getClass());
    }
}
