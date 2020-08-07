<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'serial_no'=>Str::random(5),
        'product_name'=>$faker->word,
        'description'=>$faker->sentence,
        'purchase_date'=>$faker->dateTimeThisYear($max = 'now'),
        'purchase_price'=>$faker->numberBetween($min = 1000, $max = 9000),
        'retail_price'=>$faker->numberBetween($min = 9000, $max = 20000),
        'category_id'=>factory(App\Category::class),
        'supplier_id'=>factory(App\Supplier::class),
        'quantity'=>$faker->randomDigit
    ];
});
