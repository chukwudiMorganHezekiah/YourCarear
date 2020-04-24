<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {


    return [

        'company_Industry'=>$faker->name,
        'company_name'=>$faker->company,
        'company_logo'=>'noimage.jpg',
        'company_description'=>$faker->sentence,
        'user_id'=>factory(\App\User::class)->create()->id
    ];
});
