<?php

namespace App\Entities;

class ExamInscription extends Entity
{
    protected $table = 'exam_inscriptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'grade', 'exam_id', 'course_user_subject_id',
    ];

    /**
     * Relationships
     */
    public function exam()
    {
        return $this->belongsTo(Exam::getClass());
    }

    public function course_user_subject(){
        return $this->belongsTo(CourseUserSubject::getClass());
    }
}
