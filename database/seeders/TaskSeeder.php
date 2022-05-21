<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $current_time = Carbon::now()->timezone('Europe/Moscow');

        $deadline_30_days = $current_time->addSeconds(2592000)->timezone('Europe/Moscow');

        $deadline_1_days = $current_time->addSeconds(86400)->timezone('Europe/Moscow');
        $deadline_2_days = $current_time->addSeconds(172800)->timezone('Europe/Moscow');
        $deadline_3_days = $current_time->addSeconds(259200)->timezone('Europe/Moscow');
        $deadline_5_days = $current_time->addSeconds(432000)->timezone('Europe/Moscow');
        $deadline_7_days = $current_time->addSeconds(604800)->timezone('Europe/Moscow');

        $tasks = [
            [
                'title' => 'Перевести войну и мир на клингонский',
                'description' => 'Перевести книгу, срок - месяц.',
                'category_id' => 3,
                'city_id' => 1,
                'user_id' => 1,
                'location' => 'Востряковский проезд, 16к2',
                'budget' => 35000,
                'created_at' => $current_time,
                'deadline' => $deadline_30_days,
            ],
            [
                'title' => 'Убраться в квартире после вписки',
                'description' => 'Предупреждаю, зрелище будет не из приятных. Деньгами не обижу.',
                'category_id' => 1,
                'city_id' => 2,
                'user_id' => 2,
                'location' => 'Улица Салова, 57к5',
                'budget' => 3500,
                'created_at' => $current_time,
                'deadline' => $deadline_1_days,
            ],
            [
                'title' => 'Перевезти груз на новое место',
                'description' => 'Срочно! Товары должны быть в полной сохранности по время перевозки! Возможны чаевые! Потребуется грузовик с вместимостью не меньше 750кг.',
                'category_id' => 4,
                'city_id' => 3,
                'user_id' => 3,
                'location' => 'Российская улица, 72/1к1',
                'budget' => 4000,
                'created_at' => $current_time,
                'deadline' => $deadline_1_days,
            ],
            [
                'title' => 'Починить ноутбук',
                'description' => 'На сайте увидела, что я выиграла в лотерею. Для выигрыша нужно было скачать программу, я её скачала но ноутбук почему-то перестал включаться. Есть здесь программисты которые могут вернуть всё как было?!',
                'category_id' => 2,
                'city_id' => 4,
                'user_id' => 4,
                'location' => 'Улица Карла Либкнехта, 153',
                'budget' => 1700,
                'created_at' => $current_time,
                'deadline' => $deadline_3_days,
            ],
            [
                'title' => 'Провести фотосессию на день рождения',
                'description' => 'Требуется опытный фотограф на день рождения моего сына, со стажем работы не меньше 3-ёх лет. За идеальную работу возможна доплата.',
                'category_id' => 5,
                'city_id' => 5,
                'user_id' => 5,
                'location' => 'Проспект Красного Знамени, 114',
                'budget' => 4500,
                'created_at' => $current_time,
                'deadline' => $deadline_2_days,
            ],
            [
                'title' => 'Починить дверь в автомобиле',
                'description' => 'Попал в небольшое ДТП, отвалилась дверь (не спрашивайте как). Сдавать в сервисный центр будет дорого, может кто-то сможет прикрутить её обратно за щедрую оплату?',
                'category_id' => 6,
                'city_id' => 6,
                'user_id' => 6,
                'location' => 'Улица Фрунзе, 38',
                'budget' => 10000,
                'created_at' => $current_time,
                'deadline' => $deadline_7_days,
            ],
            [
                'title' => 'Покрасить стены в комнате',
                'description' => 'Требуется опытный маляр, который сможет покрасить стены в небольшой комнатке.',
                'category_id' => 7,
                'city_id' => 7,
                'user_id' => 7,
                'location' => 'Переулок Островского, 1А',
                'budget' => 6000,
                'created_at' => $current_time,
                'deadline' => $deadline_5_days,
            ],
            [
                'title' => 'Сделать маникюр',
                'description' => 'Делаю маникюр в первый раз, хочу покрасить ногти в цвет малахита. Есть здесь опытные маникюрши?',
                'category_id' => 8,
                'city_id' => 8,
                'user_id' => 3,
                'location' => 'Путевая улица, 8В',
                'budget' => 1900,
                'created_at' => $current_time,
                'deadline' => $deadline_3_days,
            ],
        ];
        DB::table('task')->insert($tasks);
    }
}
