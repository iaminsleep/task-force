<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Руслан',
                'email' => 'ruslan@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 1,
                'rating' => 5,
                'avatar' => 'avatar-1.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Денис',
                'email' => 'denis@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 2,
                'rating' => 4,
                'avatar' => 'avatar-2.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Диана',
                'email' => 'diana@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 4,
                'rating' => 3,
                'avatar' => 'avatar-7.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Владимир',
                'email' => 'vladimir@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 5,
                'rating' => 4.75,
                'avatar' => 'avatar-6.png',
            ],
            [
                'id' => 5,
                'name' => 'Келвин',
                'email' => 'kelvin@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 1,
                'rating' => 4.9,
                'avatar' => 'avatar-3.png',
            ],
            [
                'id' => 6,
                'name' => 'Уильям',
                'email' => 'william@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 2,
                'rating' => 3.8,
                'avatar' => 'avatar-4.jpg',
            ],
            [
                'id' => 7,
                'name' => 'Дэвин',
                'email' => 'devin@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 3,
                'rating' => 4.5,
                'avatar' => 'avatar-5.png',
            ],
        ];
        DB::table('users')->insert($users);
    }
}
