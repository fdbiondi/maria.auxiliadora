<?php

namespace App\Entities;

class Subject extends Entity
{
    protected $table = "subjects";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * Relationships
     */
    public function plans() {
        return $this->belongsToMany(Plan::getClass());
    }

    public function exam_acts()
    {
        return $this->hasMany(ExamAct::getClass());
    }
}
