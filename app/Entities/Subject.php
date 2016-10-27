<?php

namespace App\Entities;

class Subject extends Entity
{
    protected $table = "subjects";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
}
