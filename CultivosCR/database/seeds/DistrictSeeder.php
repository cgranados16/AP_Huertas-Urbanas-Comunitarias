<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('countries')->insert([
        //     'Name' => 'Costa Rica',
        // ]);

        // DB::table('provinces')->insert([
        //     'Name' => 'San José',
        //     'IdCountry' => '1',
        // ]);

        // DB::table('canton')->insert([
        //     'Name' => 'San José',
        //     'IdProvince' => 1,
        // ]);

        DB::table('district')->insert([
            'Name' => 'San José',
            'IdCanton' => 1,
        ]);

        DB::table('district')->insert([
            'Name' => 'Alajuelita',
            'IdCanton' => 1,
        ]);

        DB::table('district')->insert([
            'Name' => 'Acosta',
            'IdCanton' => 1,
        ]);

        DB::table('district')->insert([
            'Name' => 'Aserrí',
            'IdCanton' => 1,
        ]);
    }
}
