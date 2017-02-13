<?php

namespace App\Entities;

class LevelPlan extends Entity
{
    public function plan() {
        return $this->belongsTo(Plan::getClass());
    }

    public function level() {
        return $this->belongsTo(Level::getClass());
    }
}
