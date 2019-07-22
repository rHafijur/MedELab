<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=[
        'id','title'
    ];
    public function users(){
        $this->hasMany('App\User');
    }
}
