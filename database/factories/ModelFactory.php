<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {

    $name = explode(" ", $faker->name);

    return [
        'firstName' => $name[0],
        'lastName' => $name[1],
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => app('hash')->make($name[0]),
    ];
});
