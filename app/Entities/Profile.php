<?php

namespace App\Entities;

class Profile extends Entity
{
    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id', 'name', 'last_name', 'dni', 'address', 'city_id', 'phone'
    ];

    public function account() {
        return $this->belongsTo(Account::getClass());
    }
}
