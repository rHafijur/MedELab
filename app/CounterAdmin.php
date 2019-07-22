<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CounterAdmin extends Model
{
    protected $fillable=[
        'user_id','counter'
    ];
    public function payments(){
        return $this->hasMany('App\Payment');
    }
}
