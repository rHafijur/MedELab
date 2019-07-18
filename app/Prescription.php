<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'patient_id','doctor_id'
    ];

    public function tests(){
        return $this->belongsToMany(Test::class);
    }

    public function medicines(){
        return $this->belongsToMany(Medicine::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
