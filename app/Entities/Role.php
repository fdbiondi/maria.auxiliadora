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
        'name', 'description'
    ];

    // Relationships
    public function users() {
        return $this->hasMany(User::class);
    }

    public function sub_modules()
    {
        return $this->belongsToMany(SubModule::getClass(), 'role_sub_modules', 'role_id');
    }
}
