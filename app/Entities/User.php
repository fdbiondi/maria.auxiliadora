<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isSuperAdmin(){
        return ($this->role == "SUPERADMIN");
    }
    public function isStudent(){
        return ($this->role == "STUDENT");
    }
    public function isPreceptor(){
        return ($this->role == "PRECEPTOR");
    }
    public function isProfessor(){
        return ($this->role == "PROFESSOR");
    }
    public function isAdministrator(){
        return ($this->role == "ADMINISTRATOR");
    }
}
