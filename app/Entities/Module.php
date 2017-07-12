<?php

namespace App\Entities;

class Module extends Entity
{
    protected $table = 'modules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    // Relationships
    public function sub_modules()
    {
        return $this->hasMany(SubModule::getClass());
    }

    public function children()
    {
        return $this->hasMany(SubModule::getClass());
    }

}
