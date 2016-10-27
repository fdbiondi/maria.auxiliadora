<?php

namespace App\Entities;

class Student extends Entity
{
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id', 'tutor_id'];

    public function account()
    {
        return $this->belongsTo(Account::getClass());
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::getClass());
    }
}
