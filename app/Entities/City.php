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
    
    public function province()
    {
        return $this->belongsTo(Province::getClass());
    }
}
