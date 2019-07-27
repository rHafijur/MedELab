<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportSubtest extends Model
{
    protected $fillable=[
        'report_id','subtest_id','value'
    ];
    public function subtest(){
       return  $this->belongsTo('App\Subtest');
    }
}
