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
    public function patient(){
        return $this->belongsTo('App\Patient');
    }
    public function pathologyDepartment(){
        return $this->belongsTo('App\PathologyDepartment');
    }
    public function prescription(){
        return $this->belongsTo('App\Prescription');
    }
    public function report(){
        return $this->hasOne('App\Report');
    }
}
