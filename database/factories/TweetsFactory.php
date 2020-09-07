<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tweet;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    $inputArray = [61, 70, 57, 86, 80, 61, 63, 70, 31, 23, 6, 32, 42, 2, 10, 61, 35, 12, 86, 47];
    return [
        'user_id' => \Illuminate\Support\Arr::random($inputArray),
        'body' => $faker->text(250)
    ];
    //User::all()->random()->id
});
