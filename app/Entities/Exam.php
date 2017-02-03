<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function subject()
    {
        return $this->belongsTo(Subject::getClass());
    }
}
