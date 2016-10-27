<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = ['account_id'];

    public function account()
    {
        return $this->belongsTo('App\Account');
    }
    
    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
