<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['id' => 1, 'name' => 'Москва'],
            ['id' => 2, 'name' => 'Санкт-Петербург'],
            ['id' => 3, 'name' => 'Краснодар'],
            ['id' => 4, 'name' => 'Иркутск'],
            ['id' => 5, 'name' => 'Владивосток'],
            ['id' => 6, 'name' => 'Мурманск'],
            ['id' => 7, 'name' => 'Ростов-на-Дону'],
            ['id' => 8, 'name' => 'Хабаровск'],
        ];

        DB::table('city')->insert($cities);
    }
}
