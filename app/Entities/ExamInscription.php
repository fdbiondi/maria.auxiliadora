<?php

namespace App\Entities;

class ExamInscription extends Entity
{
    protected $table = 'exam_inscriptions';

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
    public function exam_act()
    {
        return $this->belongsTo(ExamAct::getClass());
    }

    public function user(){
        return $this->belongsTo(User::getClass());
    }
}
