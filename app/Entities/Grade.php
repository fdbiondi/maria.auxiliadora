<?php

namespace App\Entities;

class Grade extends Entity
{
    protected $table = 'grades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mark', 'description', 'subject_registration_id'
    ];

    /**
     * Relationships
     */
    public function subject_registration() {
        return $this->belongsTo(SubjectRegistration::getClass());
    }
}
