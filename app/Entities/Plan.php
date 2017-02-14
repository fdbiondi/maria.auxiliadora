<?php

namespace App\Entities;

class Plan extends Entity
{
    protected $table = 'plans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'date', 'current'
    ];

    /**
     * Relationships
     */
    public function subjects() {
        return $this->belongsToMany(Subject::getClass());
    }

    public function levels() {
        return $this->belongsToMany(Level::getClass());
    }
}
