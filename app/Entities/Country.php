<?php

namespace App\Entities;

class Country extends Entity
{
    protected $table = 'countries';

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
    public function provinces() {
        return $this->hasMany(Province::getClass());
    }
}
