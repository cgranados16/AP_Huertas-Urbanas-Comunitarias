<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = 'Carlos';
        $user->last_name = 'Granados';
        $user->email = 'cgranados16@gmail.com';
        $user->password = bcrypt('123456');
        $user->gender = 'M';
        $user->birth_date = Carbon::parse('1998-12-16');
        $user->save();

        $user2 = new User();
        $user2->first_name = 'Dario';
        $user2->last_name = 'Monestel';
        $user2->email = 'dario@gmail.com';
        $user2->password = bcrypt('123456');
        $user2->gender = 'M';
        $user2->birth_date = Carbon::parse('1996-6-19');
        $user2->save();

        $user3 = new User();
        $user3->first_name = 'Kenneth';
        $user3->last_name = 'Sanchez';
        $user3->email = 'kenneth@gmail.com';
        $user3->password = bcrypt('123456');
        $user3->gender = 'M';
        $user3->birth_date = Carbon::parse('1991-9-2');
        $user3->save();
        
    }
}
