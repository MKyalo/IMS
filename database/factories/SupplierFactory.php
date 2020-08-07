<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'supplier_name'=>$faker->company,
        'address'=>$faker->address,
        'email'=>$faker->email,
        'phone_number'=>$faker->e164PhoneNumber,
        'location'=>$faker->country
        

    ];
});
