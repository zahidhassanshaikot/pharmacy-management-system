<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $infos=[
            [
                'name' => 'Super Admin',
                'display_name' => 'Super Admin',
            ],
            [
                'name' => 'Admin',
                'display_name' => 'Admin',
            ]
     

        ];
    
            foreach ($infos as $info) {
                Role::create($info);
            }
    }
}
