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
                'task_id' => 5,
                'author_id' => 5,
                'receiver_id' => 1,
                'comment' => 'Руслан сделал работу быстро и качественно, человек приятный в общении, благодарю его за помощь!',
                'rating' => '5',
                'created_at' => today(),
            ],
        ];
        DB::table('feedback')->insert($feedbacks);
    }
}
