<?php

namespace App\Entities;

class ExamAct extends Entity
{
    protected $table = 'exam_acts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'act_number','classroom','date_time','exam_instance_id','subject_id'
    ];

    /**
     * Relationships
     */
    public function subject()
    {
        return $this->belongsTo(Subject::getClass());
    }

    public function exam_instance()
    {
        return $this->belongsTo(ExamInstance::getClass());
    }
}
