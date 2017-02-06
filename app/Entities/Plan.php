<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //

    public function subjects() {
        return $this->belongsToMany(Subject::getClass());
    }

    public function levels() {
        return $this->belongsToMany(Level::getClass());
    }
}
