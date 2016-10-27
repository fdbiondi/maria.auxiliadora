<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id', 'resume_id'
    ];

    public function account() {
        return $this->belongsTo('App\Account');
    }

    public function resume() {
        return $this->hasOne('App\Resume');
    }

}
