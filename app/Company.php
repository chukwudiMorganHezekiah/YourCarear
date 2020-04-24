<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function job(){

        return $this->hasMany(\App\Job::class);

}
    protected $guarded=[];
}
