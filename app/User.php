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
   protected  $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->hasOne(\App\Profile::class);
    }

    public function company(){
        return $this->hasOne(\App\Company::class);
    }

    public function jobs(){
        return $this->hasMany(\App\Job::class);
    }

    public function applications(){
        return $this->hasMany(\App\Application::class);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static  function boot(){
        parent::boot();
         static::created(function($user){
            $user->profile()->create([
                'profile_image'=>'noimage.jpg',


            ]);

        }

        );
    }
}
