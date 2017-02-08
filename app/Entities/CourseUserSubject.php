<?php

namespace App\Entities;

class CourseUserSubject extends Entity
{
    public function subject()
    {
        return $this->belongsTo(Subject::getClass());
    }
    
    public function course_user() {
        return $this->belongsTo(CourseUser::getClass());
    }
}
