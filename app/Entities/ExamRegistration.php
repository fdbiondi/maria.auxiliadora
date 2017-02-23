<?php

namespace App\Entities;

class ExamRegistration extends Entity
{
    protected $table = 'exams_registration';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_act_id','user_id'
    ];

    /**
     * Relationships
     */
    public function act()
    {
        return $this->belongsTo(ExamAct::getClass());
    }

    public function user(){
        return $this->belongsTo(User::getClass());
    }
}
