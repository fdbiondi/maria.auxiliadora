<?php

namespace App\Entities;

class Exam extends Entity
{
    public function subject()
    {
        return $this->belongsTo(Subject::getClass());
    }
}
