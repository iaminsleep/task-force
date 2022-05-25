<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [
                'id' => 2,
                'name' => 'Денис',
                'email' => 'denis@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 2,
                'rating' => 4,
                'avatar' => 'avatar-2.jpg',
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [
                'id' => 3,
                'name' => 'Диана',
                'email' => 'diana@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 4,
                'rating' => 3,
                'avatar' => 'avatar-7.jpg',
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [
                'id' => 4,
                'name' => 'Владимир',
                'email' => 'vladimir@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 5,
                'rating' => 4.75,
                'avatar' => 'avatar-6.png',
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [
                'id' => 5,
                'name' => 'Стас',
                'email' => 'stas@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 1,
                'rating' => 4.9,
                'avatar' => 'avatar-4.png',
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [
                'id' => 6,
                'name' => 'Уильям',
                'email' => 'william@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 2,
                'rating' => 3.8,
                'avatar' => 'avatar-3.png',
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [
                'id' => 7,
                'name' => 'Алина',
                'email' => 'alina@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 3,
                'rating' => 4.5,
                'avatar' => 'avatar-5.png',
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
