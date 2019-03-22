<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123456'),
            ],
            [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            ],
            [
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('123456'),
            ]
     

        ];
    
            foreach ($users as $user) {
                User::create($user);
            }
    
 
    }
}
