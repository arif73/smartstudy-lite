<?php

namespace App;

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
        'name', 'email', 'password','username','role','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isStudent()
    {
        if($this->role=="student"){
            return true;
        }
        return false;
    }

    public function isTeacher()
    {
        if($this->role=="teacher"){
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        if($this->role=="admin"){
            return true;
        }
        return false;
    }

    public function show()
    {

        return view('home');
    }

    public function teacher()
    {
        return $this->hasOne('App\Teachers','userid','id');
    }

    public function student()
    {
        return $this->hasOne('App\Students','userid','id');
    }

    public function has_video_reaction(){
        $this->hasMany('App\Smartstudy_videoreaction');
    }

    public function video(){
        $this->hasMany('App\Smartstudy_video');
    }


}
