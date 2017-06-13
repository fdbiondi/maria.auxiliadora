<?php

namespace App\Entities;

class SubjectRegistration extends Entity
{
    protected $table = 'subjects_registration';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mark', 'subject_id', 'course_registration_id'
    ];
    
    /**
     * Relationships
     */
    public function subject()
    {
        return $this->belongsTo(Subject::getClass());
    }
    
    public function course_registration() {
        return $this->belongsTo(CourseRegistration::getClass());
    }

    public function exams() {
        return $this->hasMany(Exam::getClass());
    }
}
