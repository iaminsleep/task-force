<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [   
                'task_id' => 1, 
                'user_id' => 3, 
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 32000,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [   
                'task_id' => 1, 
                'user_id' => 4, 
                'message' => 'Немедленно приступллю к выполнению задания, выполню работу красиво и эффективно.',
                'price' => 36000,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            //2nd task
            [   
                'task_id' => 2, 
                'user_id' => 5, 
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 3000,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [   
                'task_id' => 2, 
                'user_id' => 6, 
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 3700,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [   
                'task_id' => 2, 
                'user_id' => 7, 
                'message' => 'Немедленно приступллю к выполнению задания, выполню работу красиво и эффективно.',
                'price' => 4000,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            //3rd task
            [   
                'task_id' => 3, 
                'user_id' => 1, 
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 3800,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [   
                'task_id' => 3, 
                'user_id' => 6, 
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 4100,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [   
                'task_id' => 3, 
                'user_id' => 4, 
                'message' => 'Немедленно приступллю к выполнению задания, выполню работу красиво и эффективно.',
                'price' => 4200,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            //4th task
            [   
                'task_id' => 4, 
                'user_id' => 3, 
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 1500,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [   
                'task_id' => 4, 
                'user_id' => 7, 
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 1200,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [   
                'task_id' => 4, 
                'user_id' => 2, 
                'message' => 'Немедленно приступллю к выполнению задания, выполню работу красиво и эффективно.',
                'price' => 2500,
                'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            ],
        ];

        DB::table('feedback')->insert($feedbacks);
    }
}
