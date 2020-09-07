<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Follower;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Follower::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'following_id' =>  User::all()->random()->id
    ];
    //User::all()->random()->id
});
