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
                'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'payment' => 30000,
                'created_at' => now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 3,
                'comment' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'payment' => 32000,
                'created_at' => now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 4,
                'comment' => 'Нахожусь в 5 минутах от вас, сразу примусь за работу!',
                'payment' => 36000,
                'created_at' => now(),
            ],
            //2nd task
            [
                'task_id' => 2,
                'user_id' => 5,
                'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'payment' => 3000,
                'created_at' => now(),
            ],
            [
                'task_id' => 2,
                'user_id' => 6,
                'comment' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'payment' => 3700,
                'created_at' => now(),
            ],
            [
                'task_id' => 2,
                'user_id' => 7,
                'comment' => 'Нахожусь в 5 минутах от вас, сразу примусь за работу!',
                'payment' => 4000,
                'created_at' => now(),
            ],
            //3rd task
            [
                'task_id' => 3,
                'user_id' => 1,
                'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'payment' => 3800,
                'created_at' => now(),
            ],
            [
                'task_id' => 3,
                'user_id' => 6,
                'comment' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'payment' => 4100,
                'created_at' => now(),
            ],
            [
                'task_id' => 3,
                'user_id' => 4,
                'comment' => 'Нахожусь в 5 минутах от вас, сразу примусь за работу!',
                'payment' => 4200,
                'created_at' => now(),
            ],
            //4th task
            [
                'task_id' => 4,
                'user_id' => 3,
                'comment' => 'Могу сделать всё в лучшем виде. У меня есть необходимый опыт и инструменты.',
                'payment' => 1500,
                'created_at' => now(),
            ],
            [
                'task_id' => 4,
                'user_id' => 7,
                'comment' => 'Примусь за выполнение задания в течение часа, сделаю быстро и качественно.',
                'payment' => 1200,
                'created_at' => now(),
            ],
            [
                'task_id' => 4,
                'user_id' => 2,
                'comment' => 'Нахожусь в 5 минутах от вас, сразу примусь за работу!',
                'payment' => 2500,
                'created_at' => now(),
            ],
        ];

        DB::table('feedback')->insert($feedbacks);
    }
}
