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
    public function acts()
    {
        return $this->hasMany(ExamAct::getClass());
    }

    /**
     * Methods
     */
    public function getFromAttribute($attr) {
        return getDateForGet($attr);
    }

    public function setFromAttribute($value) {
        $this->attributes['from'] = getDateForSet($value);
    }

    public function getToAttribute($attr) {
        return getDateForGet($attr);
    }

    public function setToAttribute($value) {
        $this->attributes['to'] = getDateForSet($value);
    }
}
