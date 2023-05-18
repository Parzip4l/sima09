<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;


class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'email' => 'sobirinjamo33@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 1,
            ],
            [
                'name' => 'Warga',
                'email' => 'warga@gmail.com',
                'password' => bcrypt('warga'),
                'level' => 1,
            ]
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
