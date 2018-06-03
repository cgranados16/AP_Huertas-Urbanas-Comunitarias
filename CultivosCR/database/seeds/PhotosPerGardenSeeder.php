<?php

use Illuminate\Database\Seeder;

class PhotosPerGardenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos_per_garden')->insert([
            'IdGarden' => 2,
            'Photo' => 'photos/gardens/1/photo1.jpg',
        ]);

        DB::table('photos_per_garden')->insert([
            'IdGarden' => 2,
            'Photo' => 'photos/gardens/1/photo3.jpg',
        ]);

        DB::table('photos_per_garden')->insert([
            'IdGarden' => 2,
            'Photo' => 'photos/gardens/1/photo8.jpg',
        ]);

        DB::table('photos_per_garden')->insert([
            'IdGarden' => 2,
            'Photo' => 'photos/gardens/1/photo18.jpg',
        ]);

        DB::table('photos_per_garden')->insert([
            'IdGarden' => 2,
            'Photo' => 'photos/gardens/1/photo17@2x.jpg',
        ]);
    }
}
