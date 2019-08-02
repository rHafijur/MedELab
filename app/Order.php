<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'patient_id','total_price','delivered'
    ];
    public function orderMedicines(){
        $this->hasMany('App\OrderMedicine');
    }
}
