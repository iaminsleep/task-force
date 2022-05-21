<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            [   
                'task_id' => 1, 
                'user_id' => 3, 
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 1500,
            ],
            [   
                'task_id' => 2, 
                'user_id' => 3, 
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 1100,
            ],
            [   
                'task_id' => 3, 
                'user_id' => 3, 
                'message' => 'Сделаю.',
                'price' => 2000,
            ],
        ];

        DB::table('feedback')->insert($feedbacks);
    }
}
