<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersPageController extends Controller
{
    public function __invoke()
    {
        $users = User::orderBy('id', 'ASC')->paginate(4);

        $main_filters = [
            [
                'name' => 'Рейтингу',
                'alias' => 'by_rating',
            ],
            [
                'name' => 'Числу заказов',
                'alias' => 'by_tasks_count',
            ],
            [
                'name' => 'Популярности',
                'alias' => 'by_popularity',
            ]
        ];

        $optional_filters = [
            [
                'name' => 'Сейчас свободен',
                'alias' => 'is_free'
            ],
            [
                'name' => 'Сейчас онлайн',
                'alias' => 'is_online'
            ],
            [
                'name' => 'Есть отзывы',
                'alias' => 'has_feedbacks',
            ],
        ];

        return view('users', [
            'users' => $users,
            'main_filters' => $main_filters,
            'optional_filters' => $optional_filters
        ]);
    }
}
