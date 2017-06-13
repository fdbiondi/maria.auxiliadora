<?php

namespace App\Entities;

class CourseRegistration extends Entity
{
    protected $table = 'courses_registration';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'user_id'
    ];

    /**
     * Relationships
     */
    public function user() {
        return $this->belongsTo(User::getClass());
    }

    public function course() {
        return $this->belongsTo(Course::getClass());
    }

    public function subject_registration() {
        return $this->hasMany(SubjectRegistration::getClass());
    }
}
