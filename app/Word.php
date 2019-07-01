<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    public function wordAdmin()
       {
           return $this->hasOne('App\WordAdmin');
       }
    public function patients()
       {
           return $this->hasMany('App\Patient');
       }
}
