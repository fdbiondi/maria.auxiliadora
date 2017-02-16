<?php

namespace App\Entities;

class ExamInstance extends Entity
{
    protected $table = 'exam_instances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','from','to'
    ];

    /**
     * Relationships
     */
    public function exam_acts()
    {
        return $this->hasMany(ExamAct::getClass());
    }
}
