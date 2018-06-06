<?php
use Faker\Generator as Faker;
use App\Models\Catalogs\TreeOrderCatalog;
use App\Models\Catalogs\ColorCatalog;
use App\Models\Catalogs\VegetableTypeCatalog;
use App\Models\Garden;
use App\Models\Vegetable;

$factory->define(App\Models\Tree::class, function (Faker $faker) {
    $gardens = TreeOrderCatalog::all()->pluck('id')->toArray();
    return [
        'Name' => $faker->firstName,
        'Order' => $faker->randomElement($gardens),
        'InDanger' => $faker->boolean,
    ];
});

$factory->define(App\Models\Vegetable::class, function (Faker $faker) {
    $colors = ColorCatalog::all()->pluck('id')->toArray();
    $types = VegetableTypeCatalog::all()->pluck('id')->toArray();

    return [
        'Name' => $faker->firstName,
        'Color' => $faker->randomElement($colors),
        'Type' => $faker->randomElement($types),
    ];
});

$factory->define(App\Models\Harvest::class, function (Faker $faker) {
    $gardens = Garden::all()->pluck('id')->toArray();
    $harvest = Vegetable::all()->pluck('id')->toArray();
    $harvest_type = DB::table('harvest_type')->get()->pluck('id')->toArray();
    $fertilizer = DB::table('fertilizercatalog')->get()->pluck('id')->toArray();

    return [
        'Garden' => $faker->randomElement($gardens),
        'Harvest' => $faker->randomElement($harvest),
        'HarvestType' => $faker->randomElement($harvest_type),
        'FertilizerRequirements' => $faker->randomElement($fertilizer),
        'Price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) ,
        'InStock' => $faker->boolean,

    ];
});
