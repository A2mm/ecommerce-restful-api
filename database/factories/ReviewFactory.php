<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'product_id' => function() { return App\Product::all()->random(); },
        'customer'   => $faker->name,
        'review'     => $faker->paragraph,
        'star'       => $faker->numberbetween(1, 5),
    ];
});