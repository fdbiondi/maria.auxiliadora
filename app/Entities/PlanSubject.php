<?php

namespace App\Entities;

class PlanSubject extends Entity
{
    protected $table = 'plan_subject';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * Relationships
     */
    public function plan() {
        return $this->belongsTo(Plan::getClass());
    }

    public function subject() {
        return $this->belongsTo(Subject::getClass());
    }
}
