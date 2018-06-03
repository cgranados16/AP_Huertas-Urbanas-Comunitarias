<?php

use Illuminate\Database\Seeder;
use App\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'IdGarden' => 2,
            'IdClient' => 41,
            'Score' => 3,
            'Date' => Carbon\Carbon::now(),
            'Description' => 'Muy bueno me encantó.',
        ]);

        Review::create([
            'IdGarden' => 2,
            'IdClient' => 43,
            'Score' => 5,
            'Date' => Carbon\Carbon::now(),
            'Description' => 'Las manzanas de esta huerta son las mejores!.',
        ]);

        Review::create([
            'IdGarden' => 2,
            'IdClient' => 94,
            'Score' => 1,
            'Date' => Carbon\Carbon::now(), 
            'Description' => 'La lechuga tenia bichitos:(.',
        ]);
        
    }
}
