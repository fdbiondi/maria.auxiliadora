<?php

namespace App\Entities;

class City extends Entity
{
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'province_id'
    ];

    /**
     * Relationships
     */
    public function province()
    {
        return $this->belongsTo(Province::getClass());
    }
}
