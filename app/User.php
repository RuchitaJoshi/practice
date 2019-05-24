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
        'name', 'email', 'password','photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address(){
        return $this->hasOne('App\Address');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function role_users(){
        return $this->belongsToMany('App\Role', 'role_user')->withPivot('active');
    }

    public function isAdmin()
    {
        foreach ($this->role_users()->get() as $role) {
            if ($role->name == "admin") {
                return true;
            }
        }
        return false;
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
