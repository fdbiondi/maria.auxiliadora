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
        'mark', 'exam_act_id', 'subject_registration_id', 'attended'
    ];

    /**
     * Relationships
     */
    public function act()
    {
        return $this->belongsTo(ExamAct::getClass());
    }

    public function subject_registration(){
        return $this->belongsTo(SubjectRegistration::getClass());
    }
}
