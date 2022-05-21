<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            [   
                'user_id' => 3, 
                'task_id' => 1, 
                'message' => 'Привет!',
            ],
            [   
                'user_id' => 3, 
                'task_id' => 2, 
                'message' => 'Привет!',
            ],
            [   
                'user_id' => 3, 
                'task_id' => 3, 
                'message' => 'Привет!',
            ],
        ];

        DB::table('message')->insert($messages);
    }
}
