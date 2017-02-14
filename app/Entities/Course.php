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
        'date', 'level_id', 'division_id'
    ];

    /**
     * Relationships
     */
    public function users() {
        return $this->belongsToMany(User::getClass());
    }
}
