<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CounterAdmin extends Model
{
    public function payments(){
        return $this->hasMany('App\Payment');
    }
}
