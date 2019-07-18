<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PathologyDepartment extends Model
{
    protected $fillable = [
        'title'
    ];

    public function tests()
    {
        return $this->hasMany('App\Test');
    }
}
