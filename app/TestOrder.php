<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestOrder extends Model
{
    protected $fillable=[
        'patient_id','prescription_id','test_id','pathology_department_id','sample_id','completed'
    ];
    public function test(){
        return $this->belongsTo('App\Test');
    }
    public function pathologyDepartment(){
        return $this->hasOne('App\PathologyDepartment');
    }
    public function prescription(){
        return $this->hasOne('App\Prescription');
    }
}
