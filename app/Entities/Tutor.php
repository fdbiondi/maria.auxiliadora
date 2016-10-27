<?php

namespace App\Entities;

class Tutor extends Entity
{
    protected $fillable = ['account_id'];

    public function account()
    {
        return $this->belongsTo(Account::getClass());
    }
    
    public function students()
    {
        return $this->hasMany(Student::getClass());
    }
}
