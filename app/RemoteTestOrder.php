<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemoteTestOrder extends Model
{
    protected $fillable=[
        'remote_patient_id','total_price'
    ];
    public function remotePatient(){
        return $this->belongsTo('App\RemotePatient');
    }
    public function tests(){
        return $this->hasMany(RemoteTestOrderTest::class);
    }
    public function remoteTestOrderTests(){
        return $this->hasMany(RemoteTestOrderTest::class);
    }
}
