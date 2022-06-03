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
            ],
            [
                'task_id' => 1,
                'user_id' => 3,
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 32000,
            ],
            [
                'task_id' => 1,
                'user_id' => 4,
                'message' => 'Нахожусь в 5 минутах от вас, выполню работу наилучшим образом.',
                'price' => 36000,
            ],
            //2nd task
            [
                'task_id' => 2,
                'user_id' => 5,
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 3000,
            ],
            [
                'task_id' => 2,
                'user_id' => 6,
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 3700,
            ],
            [
                'task_id' => 2,
                'user_id' => 7,
                'message' => 'Нахожусь в 5 минутах от вас, выполню работу наилучшим образом.',
                'price' => 4000,
            ],
            //3rd task
            [
                'task_id' => 3,
                'user_id' => 1,
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 3800,
            ],
            [
                'task_id' => 3,
                'user_id' => 6,
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 4100,
            ],
            [
                'task_id' => 3,
                'user_id' => 4,
                'message' => 'Нахожусь в 5 минутах от вас, выполню работу наилучшим образом.',
                'price' => 4200,
            ],
            //4th task
            [
                'task_id' => 4,
                'user_id' => 3,
                'message' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'price' => 1500,
            ],
            [
                'task_id' => 4,
                'user_id' => 7,
                'message' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'price' => 1200,
            ],
            [
                'task_id' => 4,
                'user_id' => 2,
                'message' => 'Нахожусь в 5 минутах от вас, выполню работу наилучшим образом.',
                'price' => 2500,
            ],
        ];

        DB::table('feedback')->insert($feedbacks);
    }
}
