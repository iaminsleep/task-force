<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusArray = [
            [
                'id' => 1,
                'name' => 'Активно',
                'alias' => 'active',
            ],
            [
                'id' => 2,
                'name' => 'Завершено',
                'alias' => 'completed',
            ],
            [
                'id' => 3,
                'name' => 'Отменено',
                'alias' => 'cancelled',
            ],
            [
                'id' => 4,
                'name' => 'Просрочено',
                'alias' => 'expired',
            ],
        ];

        DB::table('status')->insert($statusArray);
    }
}
