<?php

namespace App\Entities;

class Level extends Entity
{
    public function plans() {
        return $this->belongsToMany(Plan::getClass());
    }
}
