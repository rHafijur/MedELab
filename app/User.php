<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function wordAdmin(){
           return $this->hasOne('App\WordAdmin');
    }
    public function labAdmin(){
        return $this->hasOne('App\LabAdmin');
 }
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function patient(){
           return $this->hasOne('App\Patient','user_id','id');
    }
    public function doctor()
    {
        return $this->hasOne('App\Doctor');
    }
    public function remotePatient()
    {
        return $this->hasOne('App\RemotePatient');
    }
    
       public function counter_admin()
       {
           return $this->hasOne('App\CounterAdmin','user_id','id');
       }
}
