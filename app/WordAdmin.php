<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordAdmin extends Model
{

    protected $fillable = [
        'user_id', 'word_id'
    ];

    public function user()
      {
          return $this->belongsTo('App\User');
      }
    public function word(){
    	return $this->belongsTo('App\Word');
    }
}
