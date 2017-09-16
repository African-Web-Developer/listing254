<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cat extends Model
{
    public function items() {
    	return $this->hasMany('App\item');
    }
}
