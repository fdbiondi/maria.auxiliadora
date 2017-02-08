<?php

namespace App\Entities;

class Course extends Entity
{
    public function users() {
        return $this->belongsToMany(User::getClass());
    }
}
