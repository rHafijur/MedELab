<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable=[
        'report_id','doctor_id','details'
    ];
    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }
}
