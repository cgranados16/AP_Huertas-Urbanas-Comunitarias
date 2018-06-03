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
        //     ReviewSeeder::class,   
        // ]);
        factory(App\Models\CollaboratorsPerGarden::class, 3)->create();
    }
}
