<?php

namespace App\Entities;

class Plan extends Entity
{
    protected $table = 'plans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'date', 'current', 'level_id'
    ];

    /**
     * Relationships
     */
    public function subjects() {
        return $this->belongsToMany(Subject::getClass());
    }

    public function level() {
        return $this->belongsTo(Level::getClass());
    }

    /**
     * Methods
     */
    public function getDateAttribute($value) {
        return getDateForGet($value);
    }

    public function setDateAttribute($value) {
        $this->attributes['date'] = getDateForSet($value);
    }
}
