<?php

use Illuminate\Database\Seeder;
use App\Models\Vegetable;
use App\Models\Tree;

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

        // factory(App\Models\CollaboratorsPerGarden::class, 500)->create(); //crea colaboradore
        
        //factory(App\Models\Review::class, 500)->create(); //crea opiniones

        //factory(App\Models\PhotosPerGarden::class, 300)->create();
        //factory(App\Models\Tree::class, 300)->create();
        //factory(App\Models\Vegetable::class, 300)->create();
        //factory(App\Models\Harvest::class, 300)->create();
        $harvests = Vegetable::all();
        foreach ($harvests as $harvest) {
            DB::table('photos_per_vegetable')->insert([
                'IdVegetable' => $harvest->id,
                'Photo' => 'photos/vegetables/apple/apple.jpg',
            ]);
        }
        $harvests = Tree::all();
        foreach ($harvests as $harvest) {
            DB::table('photos_per_tree')->insert([
                'IdTree' => $harvest->id,
                'Photo' => 'photos/trees/palo/mango-arbol.jpg',
            ]);
        }
    }
}
