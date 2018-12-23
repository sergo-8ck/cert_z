<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name' => 'Sergey',
                'email' => 'sergo8ck@gmail.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'general',
                'email' => 'g@gmail.com',
                'password' => bcrypt('123456')
            ]
        ];
        foreach ($users as $key=>$value){
            User::create($value);
        }
    }
}
