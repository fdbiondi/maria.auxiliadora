<?php

namespace App\Entities;

class Role extends Entity
{
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];

    /**
     * Relationships
     */
    public function users() {
        return $this->hasMany(User::getClass());
    }
}
