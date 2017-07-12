<?php

namespace App\Entities;

class SubModule extends Entity
{
    protected $table = 'sub_modules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'module_id'
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
    public function module()
    {
        return $this->belongsTo(Module::getClass());
    }

    public function parent()
    {
        return $this->belongsTo(Module::getClass());
    }

    public function roles()
    {
        return $this->belongsToMany(Role::getClass(), 'role_sub_modules', 'sub_module_id');
    }
}
