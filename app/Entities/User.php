<?php

namespace App\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

class User extends Entity implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Authorizable, Notifiable;

    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_name', 'dni', 'address', 'phone', 'city_id', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getfileNumberAndNameAttribute() {
        return "{$this->file_number} - {$this->name} {$this->last_name}";
    }
    
    /** 
     * Relationships 
     */
    public function courses() {
        return $this->belongsToMany(Course::getClass());
    }

    public function exams_registrations() {
        return $this->hasMany(ExamRegistration::getClass());
    }

    public function tutors()
    {
        return $this->belongsToMany(User::getClass());
    }

    public function resume()
    {
        return $this->hasMany(Resume::getClass());
    }

    public function role() {
        return $this->belongsTo(Role::getClass());
    }

    /**
     * User Authorization Level - Roles Methods
     */
    public function isAdmin() {
        return $this->role->name == 'admin';
    }

    public function isSecretary() {
        return $this->role->name == 'secretary';
    }

    public function isPreceptor() {
        return $this->role->name == 'preceptor';
    }

    public function isTutor() {
        return $this->role->name == 'tutor';
    }

    public function isStudent() {
        return $this->role->name == 'student';
    }

    public function isProfessor() {
        return $this->role->name == 'professor';
    }
}
