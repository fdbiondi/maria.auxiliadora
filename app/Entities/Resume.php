<?php

namespace App\Entities;

class Resume extends Entity
{
    protected $table = 'resumes';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path'
    ];
}
