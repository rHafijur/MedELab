<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtest extends Model
{
    protected $fillable = [
        'test_id','title','reference_values','unit'
    ];
    public function test(){
        return $this->belongsTo('App\Test');
    }
}
