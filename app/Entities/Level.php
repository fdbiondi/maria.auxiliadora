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
        return $this->belongsToMany(Plan::getClass());
    }
}
