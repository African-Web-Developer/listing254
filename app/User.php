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
        'name', 'email', 'password', 'username', 'phone', 'location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setUsernameAtrribute($value) {
       $this->attribute['username'] = ucwords($value);
    }

    public function setNameAtrribute($value) {
       $this->attribute['name'] = ucwords($value);
    }

    public function getNameAtrribute($value) {
       return ucwords($value);
    }

    public function items() {
        return $this->hasMany('App\item');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
