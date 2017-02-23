<?php

namespace App\Entities;

class CourseUser extends Entity
{
    protected $table = 'course_user';

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
        return $this->hasMany(User::getClass());
    }

    public function course() {
        return $this->hasMany(Course::getClass());
    }
}
