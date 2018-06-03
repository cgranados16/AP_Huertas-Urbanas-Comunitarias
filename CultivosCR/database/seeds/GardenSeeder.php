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

        Garden::create([
            'Name' => 'Huerta de Dario',
            'IdManager' => 13,
            'Directions' => 'Por la casa de mi  abuela.',
            'District' => 3,
            'Latitude' => '9.934813',
            'Longitude' => '-84.082418',
            'GardenPicture' => 'photos/gardens/2/garden.jpg',
        ]);

        Garden::create([
            'Name' => 'Huerta de Kenneth',
            'IdManager' => 3,
            'Directions' => 'Del Pali 300 metros este',
            'District' => 6,
            'Latitude' => '9.944543',
            'Longitude' => '-84.031858',
            'GardenPicture' => 'photos/gardens/3/garden.jpg',
        ]);
    }
}
