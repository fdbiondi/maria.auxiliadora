<?php

namespace App\Entities;

class CourseUserSubject extends Entity
{
    protected $table = 'course_user_subject';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mark', 'subject_id', 'course_user_id'
    ];
    
    /**
     * Relationships
     */
    public function subject()
    {
        return $this->belongsTo(Subject::getClass());
    }
    
    public function course_user() {
        return $this->belongsTo(CourseUser::getClass());
    }

    public function exams() {
        return $this->hasMany(Exam::getClass());
    }
}
