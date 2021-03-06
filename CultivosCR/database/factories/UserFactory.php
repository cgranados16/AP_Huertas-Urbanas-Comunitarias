<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Garden;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'gender' => $faker->randomElement($array = array ('M','F')),
        'birth_date' => $faker->date($format = 'Y-m-d', $max = '-10 years'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\favoriteGardens::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();
    $gardens = Garden::all()->pluck('id')->toArray();
    return [
      'IdClient' => $faker->randomElement($users),
      'IdGarden' => $faker->randomElement($gardens),
    ];
});
