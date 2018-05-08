<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('first_name','Carlos')->first();
        $user->attachRole(1);
        // Model::unguard();
        //     $this->call('PermissionsTableSeeder');
        //     $this->call('RolesTableSeeder');
        //     $this->call('ConnectRelationshipsSeeder');
        //     //$this->call('UsersTableSeeder');
        // Model::reguard();
        

    }
}
