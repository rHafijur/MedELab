<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabAdmin extends Model
{
    public function pathologyDepartment(){
        return $this->belongsTo('App\PathologyDepartment');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
