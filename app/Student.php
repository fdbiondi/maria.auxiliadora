<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['account_id', 'tutor_id'];

    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function tutor()
    {
        return $this->belongsTo('App\Tutor');
    }
}
