<?php

namespace App\Entities;

class CourseUserSubject extends Entity
{
    protected $table = 'course_user_subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
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
}
