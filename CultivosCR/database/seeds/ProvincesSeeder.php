<?php

use Illuminate\Database\Seeder;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('provinces')->insert([
            'Name' => 'San José',
            'IdCountry' => '1',
        ]);
    }
}
