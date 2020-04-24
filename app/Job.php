<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded=[];
    //public $timestamps=false;

    public function company(){

            return $this->belongsTo(\App\Company::class, 'company_id');

    }

    public function user(){

        return $this->belongsTo(\App\User::class, 'company_id');

}

    //
}
