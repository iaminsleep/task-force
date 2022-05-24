<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'Уборка', 'alias' => 'clean'],
            ['id' => 2, 'name' => 'Техника', 'alias' => 'neo'],
            ['id' => 3, 'name' => 'Переводы', 'alias' => 'translation'],
            ['id' => 4, 'name' => 'Грузоперевозки', 'alias' => 'cargo'],
            ['id' => 5, 'name' => 'Мероприятия', 'alias' => 'photo'],
            ['id' => 6, 'name' => 'Ремонт', 'alias' => 'repair'],
            ['id' => 7, 'name' => 'Хозяйство', 'alias' => 'flat'],
            ['id' => 8, 'name' => 'Косметика', 'alias' => 'beauty'],
            ['id' => 9, 'name' => 'Курьерские услуги', 'alias' => 'courier'],
        ];

        DB::table('category')->insert($categories);
    }
}