<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'pathology_department_id','title','sample_type'
    ];
    public function pathology_department(){
    	return $this->belongsTo('App\PathologyDepartment');
    }

    public function subtests(){
        return $this->hasMany('App\Subtest');
    }
    public function reports(){
        return $this->hasMany('App\Report');
    }
}
