<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'patient_id','total_price','delivered'
    ];
    public function orderMedicines(){
        return $this->hasMany('App\OrderMedicine');
    }
    public function patient(){
        return $this->belongsTo('App\Patient');
    }
    
}
