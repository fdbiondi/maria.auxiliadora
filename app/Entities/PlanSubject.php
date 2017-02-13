<?php

namespace App\Entities;

class PlanSubject extends Entity
{
    public function plan() {
        return $this->belongsTo(Plan::getClass());
    }

    public function subject() {
        return $this->belongsTo(Subject::getClass());
    }
}
