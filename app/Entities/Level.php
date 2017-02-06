<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    public function plans() {
        return $this->belongsToMany(Plan::getClass());
    }
}
