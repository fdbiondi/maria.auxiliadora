<?php

namespace App\Entities;

class Grade extends Entity
{
    public function course_user_subject() {
        return $this->belongsTo(CourseUserSubject::getClass());
    }
}
