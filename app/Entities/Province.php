<?php

namespace App\Entities;

class Province extends Entity
{
    protected $table = 'provinces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country_id'
    ];
    
    public function country()
    {
        return $this->belongsTo(Country::getClass());
    }
}
