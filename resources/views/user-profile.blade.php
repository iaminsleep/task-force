@extends('layout')

@section('title', 'Страница пользователя '.$user->name)

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        <section class="content-view">
            <div class="user__card-wrapper">
                <div class="user__card">
                    <img src="/img/avatars/{{ $user->avatar }}" width="120" height="120" alt="Аватар пользователя">
                        <div class="content-view__headline">
                        <h1>{{ $user->name }}</h1>
                            <p>Россия, {{ $user->city->name }},
                                {{ \Carbon\Carbon::parse($user->birth_date)->diff(\Carbon\Carbon::now())->format('%y лет'); }}
                            </p>
                        <div class="profile-mini__name five-stars__rate">
                            <x-user-rating :rating="$user->rating"></x-user-rating>
                            <b>{{ $user->rating }}</b>
                        </div>
                        <b class="done-task">Выполнил(а) {{ $completedTasksCount }} заказов</b><br>
                        <b class="done-review">Получил(а) {{ $receivedFeedbacks->count() }} отзывов</b>
                        </div>
                    <div class="content-view__headline user__card-bookmark @if(auth()->user() && auth()->user()->favourites->contains('favouritable_id', $user->id)) {{ 'user__card-bookmark--current' }} @endif">
                        @if(Cache::has('user-is-online-' . $user->id))
                            <span class="online">● Онлайн</span>
                        @else
                            <span style="padding:10px;">
                                Был(а) на сайте {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                            </span>
                        @endif
                        @auth
                            @if(auth()->user()->id !== $user->id)
                                <form action="@if(auth()->user()->favourites->contains('favouritable_id', $user->id)) {{ route('favourites.delete', ['id' => $user->id]) }} @else {{ route('favourites.add', ['id' => $user->id]) }} @endif" method="post">
                                    <button type="submit" class="no-button">
                                        <a style="cursor:pointer;"><b></b></a>
                                    </button>
                                    @csrf
                                    @if(auth()->user()->favourites->contains('favouritable_id', $user->id))
                                        @method('DELETE')
                                    @endif
                                </form>
                            @endif
                        @else
                            <div>
                                <a style="cursor:pointer;" class="open-modal" data-for="enter-form">
                                    <b></b>
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
                <div class="content-view__description">
                    <p>{{ $user->description }}</p>
                </div>
                <div class="user__card-general-information">
                    <div class="user__card-info">
                        <h3 class="content-view__h3">Специализации</h3>
                        <div class="link-specialization">
                            @foreach(json_decode($user->specialization, true) as $specialization)
                                <a href="/search-user?specialization_id={{ $specialization }}" class="link-regular">{{ $categories->toArray()[$specialization]["name"] }}</a>
                            @endforeach
                        </div>
                        <h3 class="content-view__h3">Контакты</h3>
                        <div class="user__card-link">
                            @if($user->phone)
                                <a class="user__card-link--tel link-regular" href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                            @endif
                            <a class="user__card-link--email link-regular" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            @if($user->skype)
                                <a class="user__card-link--skype link-regular" href="skype:{{ $user->skype }}?call">{{ $user->skype }}</a>
                            @endif
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
                        @if($user->id === auth()->user()->id)
                            <p>Вам ещё никто не оставлял отзыв!</p>
                        @else
                            <p>У данного пользователя нету отзывов.</p>
                        @endif
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
