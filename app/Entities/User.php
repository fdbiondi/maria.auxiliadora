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

    /** Properties */

    public function getFileNumberAndNameAttribute() {
        return "{$this->file_number} - {$this->name} {$this->last_name}";
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }
    
    /** Relationships */
    public function courses() {
        return $this->belongsToMany(Course::getClass(), 'courses_registration');
    }

    public function subjects()
    {
        return $this->hasManyThrough(SubjectRegistration::getClass(), CourseRegistration::getClass(), 'user_id', 'course_registration_id', 'id');
    }

    public function exams_registration() {
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

    /** Methods */
    public function currentCourse()
    {
        //TODO hacer una validación o bandera para traer el curso acual.
//        return $this->courses()->orderBy('year')->first()->description ?? 'No está inscripto';
        return $this->courses->max('year')->description ?? 'No está inscripto';
    }

    public function getPendingSubjects()
    {
        // TODO validar que traiga las materias a las que no esté inscripto a rendir.
        return $this->subjects()
            ->where('status', 'pending')
            ->with(['subject', 'course_registration', 'course_registration.course.level'])
            ->get();
    }
}
