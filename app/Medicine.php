<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'title','power','company','group',
        // 'morning','afternoon','night'
    ];
}
