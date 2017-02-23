<?php

namespace App\Entities;

class LevelPlan extends Entity
{
    protected $table = 'level_plan';

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

    public function level() {
        return $this->belongsTo(Level::getClass());
    }
}
