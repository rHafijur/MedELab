<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{   
    protected $fillable=[
        'patient_id','counter_admin_id','total_price'
    ];
    public function patient(){
        return $this->belongsTo('App\Patient');
    }
    public function counterAdmin(){
        return $this->belongsTo('App\CounterAdmin');
    }
    public function testPayments(){
           return $this->hasMany('App\TestPayment');
    }
    public function prescription(){
        return $this->belongsTo('App\Prescription');
    }
}
