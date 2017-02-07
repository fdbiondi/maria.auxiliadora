<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function course_user_subject() {
        return $this->belongsTo(CourseUserSubject::getClass());
    }
}
