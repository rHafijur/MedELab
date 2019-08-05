<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemoteTestOrderTest extends Model
{
    protected $fillable=[
        'test_id','sample_id','price','pathology_department_id','completed'
    ];

    public function remoteTestOrder(){
        return $this->belongsTo('App\RemoteTestOrder');
    }
    public function test(){
        return $this->belongsTo('App\Test');
    }
}
