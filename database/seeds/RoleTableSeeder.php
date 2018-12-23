<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            [
                'name' => 'superuser',
                'display_name' => 'Superuser',
                'description' => 'Admin Site'
            ],
            [
                'name' => 'general-user',
                'display_name' => 'User',
                'description' => 'General User'
            ]
        ];

        foreach ($roles as $key=>$value){
            Role::create($value);
        }
    }
}
