<?php

namespace App\Entities;

class Course extends Entity
{
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year', 'level_id', 'division_id'
    ];

    /**
     * Relationships
     */
    public function users() {
        return $this->belongsToMany(User::getClass(), 'courses_registration');
    }

    public function students() {
        return $this->belongsToMany(User::getClass(), 'courses_registration');
    }

    public function level() {
        return $this->belongsTo(Level::getClass());
    }

    public function division() {
        return $this->belongsTo(Division::getClass());
    }

    public function course_registration() {
        return $this->belongsToMany(CourseRegistration::getClass(), 'courses_registration');
    }
    
    /**
     * Methods
     */

    public function getDescriptionAttribute()
    {
        return "{$this->level->name}° {$this->division->name} - {$this->year}" ;
    }
}
