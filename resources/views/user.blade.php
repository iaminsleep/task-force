@extends('layout')

@section('title', 'Исполнители')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        <section class="content-view">
            <div class="user__card-wrapper">
                <div class="user__card">
                    <img src="/img/avatar/{{ $user->avatar }}" width="120" height="120" alt="Аватар пользователя">
                        <div class="content-view__headline">
                        <h1>{{ $user->name }}</h1>
                            <p>Россия, {{ $user->city->name }}, 30 лет</p>
                        <div class="profile-mini__name five-stars__rate">
                            <x-user-rating :rating="$user->rating"></x-user-rating>
                            <b>{{ $user->rating }}</b>
                        </div>
                        <b class="done-task">Выполнил(а) {{ $completedTasksCount }} заказов</b><br>
                        <b class="done-review">Получил(а) {{ $receivedFeedbacks->count() }} отзывов</b>
                        </div>
                    <div class="content-view__headline user__card-bookmark user__card-bookmark--current">
                        <span>Был(а) на сайте 25 минут назад</span>
                            <a href="#"><b></b></a>
                    </div>
                </div>
                <div class="content-view__description">
                    <p>Внезапно, ключевые особенности структуры проекта неоднозначны и будут подвергнуты целой серии
                    независимых исследований. Следует отметить, что высококачественный прототип будущего проекта, в
                    своём классическом представлении, допускает внедрение своевременного выполнения сверхзадачи.
                    Кстати, некоторые особенности внутренней политики будут функционально разнесены на
                    независимые элементы.</p>
                </div>
                <div class="user__card-general-information">
                    <div class="user__card-info">
                        <h3 class="content-view__h3">Специализации</h3>
                        <div class="link-specialization">
                            <a href="#" class="link-regular">Ремонт</a>
                            <a href="#" class="link-regular">Курьер</a>
                            <a href="#" class="link-regular">Оператор ПК</a>
                        </div>
                        <h3 class="content-view__h3">Контакты</h3>
                        <div class="user__card-link">
                            <a class="user__card-link--tel link-regular" href="#">8 (555) 172 83 69</a>
                            <a class="user__card-link--email link-regular" href="#">{{ $user->email }}</a>
                            <a class="user__card-link--skype link-regular" href="#">Kumarm</a>
                        </div>
                        </div>
                    <div class="user__card-photo">
                        <h3 class="content-view__h3">Фото работ</h3>
                        <a href="#"><img src="/img/rome-photo.jpg" width="85" height="86" alt="Фото работы"></a>
                        <a href="#"><img src="/img/smartphone-photo.png" width="85" height="86" alt="Фото работы"></a>
                        <a href="#"><img src="/img/dotonbori-photo.png" width="85" height="86" alt="Фото работы"></a>
                        </div>
                </div>
            </div>
            <div class="content-view__feedback">
                <h2>Отзывы @if($receivedFeedbacks->count() > 0)<span>({{ $receivedFeedbacks->count() }})</span>@endif</h2>
                <div class="content-view__feedback-wrapper reviews-wrapper">
                    @forelse($receivedFeedbacks as $feedback)
                        <x-feedback :feedback="$feedback"></x-feedback>
                    @empty
                        <p>Вам ещё никто не оставлял отзыв!</p>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
