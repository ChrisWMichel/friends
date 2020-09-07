<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tweet;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'body' => $faker->text(250),
        'type' => \Illuminate\Support\Arr::random(['tweet', 'retweet', 'quote'])
    ];
    // \Illuminate\Support\Arr::random($inputArray)
});
