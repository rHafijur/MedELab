<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemotePatient extends Model
{
    protected $fillable=[
        'user_id','age','phone','city','street'
    ];
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function remoteTestOrders(){
    	return $this->hasMany('App\RemoteTestOrder');
    }
}
