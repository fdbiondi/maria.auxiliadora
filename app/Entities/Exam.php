<?php

namespace App\Entities;

class Exam extends Entity
{
    protected $table = 'exams';

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
    public function subject()
    {
        return $this->belongsTo(Subject::getClass());
    }
}
