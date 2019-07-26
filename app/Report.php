<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable=[
        'test_order_id','lab_admin_id'
    ];
    public function reportSubtests(){
        return $this->hasMany("App\ReportSubtest");
    }
}
