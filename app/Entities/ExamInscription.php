<?php

namespace App\Entities;

class ExamInscription extends Entity
{
    public function exam()
    {
        return $this->belongsTo(Exam::getClass());
    }

    public function course_user_subject(){
        return $this->belongsTo(CourseUserSubject::getClass());
    }
}
