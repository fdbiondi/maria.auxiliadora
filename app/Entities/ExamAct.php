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

    public function instance()
    {
        return $this->belongsTo(ExamInstance::getClass());
    }
    
    public function registrations() {
        return $this->hasMany(ExamRegistration::getClass());
    }

    public function exams() {
        return $this->hasMany(Exam::getClass());
    }
    
    /**
     * Methods
     */
    public function getDateTimeAttribute($attr) {
        return getDateTimeForGet($attr);
    }

    public function setDateTimeAttribute($value) {
        $this->attributes['date_time'] = getDateTimeForSet($value);
    }
}
