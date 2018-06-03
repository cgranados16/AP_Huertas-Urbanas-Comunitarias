<?php

use App\Garden;
use Illuminate\Database\Seeder;

class GardenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Garden::create([
            'Name' => 'Huerta de Carlitos',
            'IdManager' => 1,
            'Directions' => '50m oeste de entrada principal de la escuela.',
            'District' => 2,
            'Latitude' => '9.919317',
            'Longitude' => '-84.067619',
            'GardenPicture' => 'photos/gardens/1/garden.jpg',
        ]);
    }
}
