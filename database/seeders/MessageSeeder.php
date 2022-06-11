<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            //1 task
            [
                'user_id' => 1,
                'task_id' => 1,
                'message' => 'Задавайте свои вопросы по поводу работы сюда.',
                'created_at' => now(),

            ],
            [
                'user_id' => 4,
                'task_id' => 1,
                'message' => 'Привет!',
                'created_at' => now(),

            ],
            [
                'user_id' => 1,
                'task_id' => 1,
                'message' => 'Пишите кратко и по делу.',
                'created_at' => now(),

            ],
            [
                'user_id' => 4,
                'task_id' => 1,
                'message' => 'Можно ли работать удалённо?',
                'created_at' => now(),

            ],
            [
                'user_id' => 1,
                'task_id' => 1,
                'message' => 'Здравствуйте, да, можно.',
                'created_at' => now(),

            ],
        ];

        DB::table('message')->insert($messages);
    }
}
