<?php

namespace App\Entities;

class Exam extends Entity
{
    protected $table = 'exams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mark', 'exam_act_id', 'course_user_subject_id', 'attended'
    ];

    /**
     * Relationships
     */
    public function act()
    {
        return $this->belongsTo(ExamAct::getClass());
    }

    public function course_user_subject(){
        return $this->belongsTo(CourseUserSubject::getClass());
    }
}
