<?php

use Illuminate\Database\Seeder;

class CantonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('canton')->insert([
            'Name' => 'San José',
            'IdProvince' => 1,
        ]);

    }
}
