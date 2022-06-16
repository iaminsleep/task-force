<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Руслан Крючков',
                'email' => 'ruslan@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 1,
                'rating' => 5,
                'avatar' => 'avatar-1.jpg',
                'description' => 'Не следует, однако, забывать, что сложившаяся структура организации напрямую зависит от новых предложений. А также элементы политического процесса неоднозначны и будут ассоциативно распределены по отраслям.',
                'phone' => '7(382)145-93-66',
                'skype' => 'ruslankr',
                'specialization' => '["1", "2", "3"]',
                'birth_date' => '2000-11-13',
                'last_seen' => Carbon::now()->toDateTimeString(),
                'created_at' => today(),
            ],
            [
                'id' => 2,
                'name' => 'Астахов Павел',
                'email' => 'pavel@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 2,
                'rating' => 2.2,
                'avatar' => 'avatar-2.jpg',
                'description' => 'Прежде всего, существующая теория не даёт нам иного выбора, кроме определения глубокомысленных рассуждений. Сложно сказать, почему непосредственные участники технического прогресса являются только методом политического участия и обнародованы.',
                'phone' => '7(09)687-80-00',
                'skype' => 'paavel11',
                'specialization' => '["3", "4"]',
                'birth_date' => '1990-02-06',
                'last_seen' => Carbon::now()->toDateTimeString(),
                'created_at' => today(),
            ],
            [
                'id' => 3,
                'name' => 'Диана Волкова',
                'email' => 'diana@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 4,
                'rating' => 3,
                'avatar' => 'avatar-7.jpg',
                'description' => 'Ясность нашей позиции очевидна: укрепление и развитие внутренней структуры не даёт нам иного выбора, кроме определения форм воздействия. И нет сомнений, что диаграммы связей освещают чрезвычайно интересные особенности картины в целом.',
                'phone' => '7(967)972-32-11',
                'skype' => 'dddiana23',
                'specialization' => '["6", "7"]',
                'birth_date' => '1995-09-09',
                'last_seen' => Carbon::now()->toDateTimeString(),
                'created_at' => today(),
            ],
            [
                'id' => 4,
                'name' => 'Миронов Алексей',
                'email' => 'alexey@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 5,
                'rating' => 4.75,
                'avatar' => 'avatar-6.png',
                'description' => 'В рамках спецификации современных стандартов, многие известные личности объективно рассмотрены соответствующими инстанциями.',
                'phone' => '7(967)303-23-48',
                'skype' => null,
                'specialization' => '["4", "5"]',
                'birth_date' => '1989-12-11',
                'last_seen' => Carbon::now()->toDateTimeString(),
                'created_at' => today(),
            ],
            [
                'id' => 5,
                'name' => 'Стас Устинов',
                'email' => 'stas@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 1,
                'rating' => 1.1,
                'avatar' => 'avatar-4.png',
                'description' => 'Разнообразный и богатый опыт говорит нам, что реализация намеченных плановых заданий позволяет оценить значение вывода текущих активов. Внезапно, представители современных социальных резервов будут функционально разнесены на независимые элементы.',
                'phone' => '7(977)955-38-62',
                'skype' => null,
                'specialization' => '["8", "9", "2"]',
                'birth_date' => '2001-03-25',
                'last_seen' => Carbon::now()->toDateTimeString(),
                'created_at' => today(),
            ],
            [
                'id' => 6,
                'name' => 'Мамедов Кумар',
                'email' => 'kumar@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 2,
                'rating' => 3.8,
                'avatar' => 'avatar-3.png',
                'description' => 'Идейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности влечет за собой процесс внедрения и модернизации стандартных подходов...',
                'phone' => '7(965)024-29-51',
                'skype' => null,
                'specialization' => '["4", "9", "1"]',
                'birth_date' => '1998-06-19',
                'last_seen' => Carbon::now()->toDateTimeString(),
                'created_at' => today(),
            ],
            [
                'id' => 7,
                'name' => 'Морозова Евгения',
                'email' => 'evgeniya@email.com',
                'password' => bcrypt('password@'),
                'city_id' => 3,
                'rating' => 4.5,
                'avatar' => 'avatar-5.png',
                'description' => 'Здоровый праздничный ужин вовсе не обязательно должен состоять из шпината, гречки и вареной куриной грудки. Самыми лучшими способами приготовления еды являются следующие: варка на пару, запекание или варка в воде.',
                'phone' => '7(903)938-71-46',
                'skype' => 'evgmorozova',
                'specialization' => '["5"]',
                'birth_date' => '1997-07-18',
                'last_seen' => Carbon::now()->toDateTimeString(),
                'created_at' => today(),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
