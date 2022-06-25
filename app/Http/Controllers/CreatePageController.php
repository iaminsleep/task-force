<?php

namespace App\Http\Controllers;

class CreatePageController extends Controller
{
    public function __invoke()
    {
        $errors_array = [
            [
                'name' => 'Заголовок',
                'alias' => 'title'
            ],
            [
                'name' => 'Описание задания',
                'alias' => 'description'
            ],
            [
                'name' => 'Категория',
                'alias' => 'category_id'
            ],
            [
                'name' => 'Адрес',
                'alias' => 'location'
            ],
            [
                'name' => 'Бюджет',
                'alias' => 'budget'
            ],
            [
                'name' => 'Срок исполнения',
                'alias' => 'deadline'
            ],
            [
                'name' => 'Файлы',
                'alias' => 'files'
            ],
        ];

        return view('create.index', [ 'errors_array' => $errors_array ]);
    }
}
