<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     // CountriesSeeder::class,
        //     // ProvincesSeeder::class,
        //     // CantonSeeder::class,
        //     // DistrictSeeder::class,
            
        // ]);
        //factory(App\Models\User::class, 500)->create(); //crea 150 usuarios
        //factory(App\Models\Garden::class, 150)->create(); //crea colaboradores
        // factory(App\Models\CollaboratorsPerGarden::class, 500)->create(); //crea colaboradores
        factory(App\Models\Review::class, 500)->create(); //crea opiniones

    }
}
