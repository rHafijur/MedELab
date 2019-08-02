<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMedicine extends Model
{
    protected $fillable=[
        'pharmacy_medicine_id','quantity','order_id','unit_price'
    ];
}
