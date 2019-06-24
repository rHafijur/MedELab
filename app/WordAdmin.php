<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordAdmin extends Model
{
    protected $fillable = [
        'user_id', 'word_id'
    ];
}
