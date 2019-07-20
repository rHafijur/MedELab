<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestPayment extends Model
{
    protected $fillable=[
        'payment_id','test_id','price'
    ];
    public function payment(){
        return $this->belongsTo('App\Payment');
    }
    public function test(){
        return $this->belongsTo('App\Test');
    }
    
    
}
