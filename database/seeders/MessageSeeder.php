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
                'user_id' => 3,
                'task_id' => 1,
                'message' => 'Привет всем!',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'task_id' => 1,
                'message' => 'Не засоряйте чат простым приветствием. Пишите кратко и по делу.',
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'task_id' => 1,
                'message' => 'Здравствуйте, можно ли работать удалённо?',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'task_id' => 1,
                'message' => 'Здравствуйте, да, можно.',
                'created_at' => now(),
            ],
            //2nd task
            [
                'user_id' => 3,
                'task_id' => 2,
                'message' => 'Здравствуйте! Насколько всё там плохо?',
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'task_id' => 2,
                'message' => 'Придёте, увидете.',
                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'task_id' => 2,
                'message' => 'Что-то мне страшно, ребята...',
                'created_at' => now(),
            ],
            //3rd task
            [
                'user_id' => 6,
                'task_id' => 3,
                'message' => 'Привет! Мой Ford Focus подойдёт для этой работы?',
                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'task_id' => 3,
                'message' => 'Это что, шутка? Нет, конечно же.',
                'created_at' => now(),
            ],
            //4th task
            [
                'user_id' => 7,
                'task_id' => 4,
                'message' => 'Здравия желаю! Вы пробовали перезагрузить ноутбук (выключить и включить его)?',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'task_id' => 4,
                'message' => 'Автор, пожалуйста ответьте человеку выше. Меня интересует тот же вопрос.',
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'task_id' => 4,
                'message' => 'Пока вы тут задаёте такие вопросы, вирусы у автора все данные закачать успеют!',
                'created_at' => now(),
            ],
        ];

        DB::table('message')->insert($messages);
    }
}
