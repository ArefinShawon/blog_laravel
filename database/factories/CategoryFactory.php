<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->word,
        'cat_desc' => $faker->sentence('6'),
        'status' => $faker->numberBetween(0,1)
    ];
});
