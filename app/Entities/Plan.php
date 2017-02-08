<?php

namespace App\Entities;

class Plan extends Entity
{

    public function subjects() {
        return $this->belongsToMany(Subject::getClass());
    }

    public function levels() {
        return $this->belongsToMany(Level::getClass());
    }
}
