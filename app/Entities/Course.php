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
        return $this->belongsToMany(User::getClass());
    }

    public function students() {
        return $this->belongsToMany(User::getClass());
    }

    public function level() {
        return $this->belongsTo(Level::getClass());
    }

    public function division() {
        return $this->belongsTo(Division::getClass());
    }
    
    /**
     * Methods
     */

    public function getDescriptionAttribute()
    {
        return "{$this->level->name}° {$this->division->name} - {$this->year}" ;
    }
}
