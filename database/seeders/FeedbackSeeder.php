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
                'id' => 1,
                'task_id' => 12,
                'author_id' => 5,
                'receiver_id' => 1,
                'comment' => 'Руслан сделал работу быстро и качественно, благодарю его за помощь!',
                'rating' => '5',
                'created_at' => today(),
            ],
            [
                'id' => 2,
                'task_id' => 13,
                'author_id' => 6,
                'receiver_id' => 2,
                'comment' => 'Павел выполнил работу отвратительно, кажется что мусора стало только больше!',
                'rating' => '2',
                'created_at' => today(),
            ],
            [
                'id' => 3,
                'task_id' => 14,
                'author_id' => 7,
                'receiver_id' => 3,
                'comment' => 'Работа была выполнена, но всё это затянулось надолго.',
                'rating' => '3',
                'created_at' => today(),
            ],
            [
                'id' => 4,
                'task_id' => 15,
                'author_id' => 4,
                'receiver_id' => 6,
                'comment' => 'Кумар забыл взять с собой инструменты, и ему пришлось ехать к себе домой за ними. Сама работа была выполнена качественно.',
                'rating' => '4',
                'created_at' => today(),
            ],
        ];
        DB::table('feedback')->insert($feedbacks);
    }
}
