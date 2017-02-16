<?php

namespace App\Entities;

class Course extends Entity
{
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'level_id', 'division_id'
    ];

    /**
     * Relationships
     */
    public function users() {
        return $this->belongsToMany(User::getClass());
    }

    public function level() {
        return $this->belongsTo(Level::getClass());
    }

    public function division() {
        return $this->belongsTo(Division::getClass());
    }
    
    /**
     * Methods
     */
    public function getDateAttribute($attr) {
        return getDateForGet($attr);
    }

    public function setDateAttribute($value) {
        $this->attributes['date'] = getDateForSet($value);
    }
}
