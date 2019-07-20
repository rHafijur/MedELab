<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id','age','phone','address','attendants_name','attendants_phone','word_id','bed',
    ];
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function word(){
    	return $this->belongsTo('App\Word');
    }
    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }
    public function prescriptions()
    {
        return $this->hasMany('App\Prescription');
    }
    public function payments(){
        return $this->hasMany('App\Payment');
    }
}
