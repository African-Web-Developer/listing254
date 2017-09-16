<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public function cat() {
    	return $this->belongsTo('App\cat');
    }

    public function user() {
    	return $this->belongsTo('App\User', 'owner_id');
    }

    public function comments() {
    	return $this->hasMany('App\Comment');
    }
}
