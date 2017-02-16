<?php

namespace App\Entities;

class Division extends Entity
{
    protected $table = 'divisions';

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
}
