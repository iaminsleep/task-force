<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedbacks = [
            //1th task
            [   
                'task_id' => 1, 
                'user_id' => 2, 
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 30000,
                'created_at' => now(),
            ],
            [   
                'task_id' => 1, 
                'user_id' => 3, 
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 32000,
                'created_at' => now(),
            ],
            [   
                'task_id' => 1, 
                'user_id' => 4, 
                'message' => 'Нахожусь в 5 минутах от вас, работа будет выполнена наилучшим образом!',
                'price' => 36000,
                'created_at' => now(),
            ],
            //2nd task
            [   
                'task_id' => 2, 
                'user_id' => 5, 
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 3000,
                'created_at' => now(),
            ],
            [   
                'task_id' => 2, 
                'user_id' => 6, 
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 3700,
                'created_at' => now(),
            ],
            [   
                'task_id' => 2, 
                'user_id' => 7, 
                'message' => 'Нахожусь в 5 минутах от вас, работа будет выполнена наилучшим образом!',
                'price' => 4000,
                'created_at' => now(),
            ],
            //3rd task
            [   
                'task_id' => 3, 
                'user_id' => 1, 
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 3800,
                'created_at' => now(),
            ],
            [   
                'task_id' => 3, 
                'user_id' => 6, 
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 4100,
                'created_at' => now(),
            ],
            [   
                'task_id' => 3, 
                'user_id' => 4, 
                'message' => 'Нахожусь в 5 минутах от вас, работа будет выполнена наилучшим образом!',
                'price' => 4200,
                'created_at' => now(),
            ],
            //4th task
            [   
                'task_id' => 4, 
                'user_id' => 3, 
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 1500,
                'created_at' => now(),
            ],
            [   
                'task_id' => 4, 
                'user_id' => 7, 
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 1200,
                'created_at' => now(),
            ],
            [   
                'task_id' => 4, 
                'user_id' => 2, 
                'message' => 'Нахожусь в 5 минутах от вас, работа будет выполнена наилучшим образом!',
                'price' => 2500,
                'created_at' => now(),
            ],
        ];

        DB::table('feedback')->insert($feedbacks);
    }
}
