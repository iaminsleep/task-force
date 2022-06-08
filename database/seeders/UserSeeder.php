<?php

namespace Database\Seeders;

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
                'name' => 'Руслан Крючков',
                'email' => 'ruslan@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 1,
                'rating' => 5,
                'avatar' => 'avatar-1.jpg',
                'created_at' => today(),
            ],
            [
                'id' => 2,
                'name' => 'Астахов Павел',
                'email' => 'pavel@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 2,
                'rating' => 2.2,
                'avatar' => 'avatar-2.jpg',
                'created_at' => today(),
            ],
            [
                'id' => 3,
                'name' => 'Диана Волкова',
                'email' => 'diana@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 4,
                'rating' => 3,
                'avatar' => 'avatar-7.jpg',
                'created_at' => today(),
            ],
            [
                'id' => 4,
                'name' => 'Миронов Алексей',
                'email' => 'alexey@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 5,
                'rating' => 4.75,
                'avatar' => 'avatar-6.png',
                'created_at' => today(),
            ],
            [
                'id' => 5,
                'name' => 'Стас Устинов',
                'email' => 'stas@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 1,
                'rating' => 1.1,
                'avatar' => 'avatar-4.png',
                'created_at' => today(),
            ],
            [
                'id' => 6,
                'name' => 'Мамедов Кумар',
                'email' => 'kumar@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 2,
                'rating' => 3.8,
                'avatar' => 'avatar-3.png',
                'created_at' => today(),
            ],
            [
                'id' => 7,
                'name' => 'Морозова Евгения',
                'email' => 'evgeniya@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 3,
                'rating' => 4.5,
                'avatar' => 'avatar-5.png',
                'created_at' => today(),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
