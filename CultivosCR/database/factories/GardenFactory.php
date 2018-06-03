<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Garden;


$factory->define(App\Models\Garden::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();
    
    return [
        'Name' => $faker->catchPhrase ,
        'IdManager' => $faker->randomElement($users),
        'Directions' =>  $faker->address,
        'District' => 2,
        'Latitude' =>  $faker->latitude($min = 8, $max = 12),
        'Longitude' =>  $faker->latitude($min = -85, $max = -82),
        'GardenPicture' => 'photos/gardens/1/garden.jpg',
    ];
});

$factory->define(App\Models\CollaboratorsPerGarden::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();
    $gardens = Garden::all()->pluck('id')->toArray();
    return [
        'IdGarden' => $faker->randomElement($gardens),
        'IdCollaborator' => $faker->randomElement($users),
    ];
});

$factory->define(App\Models\Review::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();
    $gardens = Garden::all()->pluck('id')->toArray();
    return [
        'IdGarden' => $faker->randomElement($gardens),
        'IdClient' => $faker->randomElement($users),
        'Score' =>  $faker->numberBetween($min = 1, $max = 5),
        'Date' =>  $faker->dateTime($max = 'now', $timezone = null),
        'Description' =>  $faker->text($maxNbChars = 1000) ,
    ];
});
