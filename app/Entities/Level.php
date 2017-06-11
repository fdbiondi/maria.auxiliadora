<?php

namespace App\Entities;

class Level extends Entity
{
    protected $table = 'levels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Relationships
     */
    public function plans() {
        return $this->hasMany(Plan::getClass());
    }
    
    public function course() {
        return $this->hasMany(Course::getClass());
    }
}
