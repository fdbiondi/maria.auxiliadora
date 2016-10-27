<?php

namespace App\Entities;

class Professor extends Entity
{
    protected $table = 'professors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id', 'resume_id'
    ];

    public function account() {
        return $this->belongsTo(Account::getClass());
    }

    public function resume() {
        return $this->hasOne(Resume::getClass());
    }

}
