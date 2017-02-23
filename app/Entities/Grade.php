<?php

namespace App\Entities;

class Grade extends Entity
{
    protected $table = 'grades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mark', 'description', 'course_user_subject_id'
    ];

    /**
     * Relationships
     */
    public function course_user_subject() {
        return $this->belongsTo(CourseUserSubject::getClass());
    }
}
