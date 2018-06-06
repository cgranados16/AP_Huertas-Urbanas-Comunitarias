<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Garden;
use App\Models\Harvest;
use App\Models\Sale;
use App\Models\HarvestBySale;
use App\Models\Trade;
use App\Models\HarvestByTrade;


$factory->define(App\Models\Sale::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();
    $gardens = Garden::all()->pluck('id')->toArray();

    return [
        'IdClient' => $faker->randomElement($users),
        'TotalPrice' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100000.0000),
        'IdGarden' => $faker->randomElement($gardens),
    ];
});

$factory->define(App\Models\HarvestBySale::class, function (Faker $faker) {
    $harvest = Harvest::all()->pluck('id')->toArray();
    $sale = Sale::all()->pluck('id')->toArray();

    return [
        'IdSale' => $faker->randomElement($sale),
        'IdHarvest' => $faker->randomElement($harvest),
        'Quantity' => $faker->numberBetween($min = 1, $max = 10),
    ];
});

$factory->define(App\Models\Trade::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();
    $gardens = Garden::all()->pluck('id')->toArray();

    return [
        'IdClient' => $faker->randomElement($users),
        'IdGarden' => $faker->randomElement($gardens),
    ];
});

  $factory->define(App\Models\HarvestByTrade::class, function (Faker $faker) {
    $harvest = Harvest::all()->pluck('id')->toArray();
    $trade = Trade::all()->pluck('id')->toArray();

    return [
        'IdTrade' => $faker->randomElement($trade),
        'IdHarvest' => $faker->randomElement($harvest),
        'Quantity' => $faker->numberBetween($min = 1, $max = 5),
        'Receiving' => $faker->boolean,
    ];
});
