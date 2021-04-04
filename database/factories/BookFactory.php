<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BookManagement;
use Faker\Generator as Faker;

$factory->define(BookManagement::class, function (Faker $faker) {
    return [
        
        'bookname' => $faker->name,
        'bookauthor' => $faker->name,
    ];
});
