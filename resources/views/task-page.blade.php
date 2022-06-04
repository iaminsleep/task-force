@extends('layout')

@section('title', 'Просмотр задания')

@section('head')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=3b001707-d3da-49cd-ae1b-bdd710add366"
        type="text/javascript"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main-class', 'page-main')

@section('scripts')
    {{-- Yandex Maps --}}
    @if($coordinates !== null)
        <script type="text/javascript">
            ymaps.ready(init);
            var myMap;
            const latitude = @json($coordinates[0]);
            const longitude = @json($coordinates[1]); // modern way of passing the php variable to javascript

            function init() {

                myMap = new ymaps.Map("map", {
                    center: [latitude, longitude], // coordinates of the location (center map)
                    zoom: 16 // map scale
                });

                myMap.controls.add(
                    new ymaps.control.ZoomControl() // add a zoom control to the map
                );

                myPlacemark = new ymaps.Placemark([latitude, longitude], { // coordinates of the placemark obj
                    balloonContent: "<div class='ya_map'>Место встречи</div>" // placemark baloon tip content
                }, {
                    preset: "twirl#redDotIcon" // placemark type
                });

                myMap.geoObjects.add(myPlacemark); // add a placemark

            };
        </script>
    @endif

    {{-- Messenger --}}
    <script type="text/javascript">
        var authUserId = @json($auth_user_id); //pass authenticated user id to the messenger script
    </script>
    <script src="/public/js/messenger.js"></script>
@endsection

@section('page-content')
    <div class="main-container page-container">
        <section class="content-view">
            <div class="content-view__card">
                <div class="content-view__card-wrapper">
                    <div class="content-view__header">
                        <div class="content-view__headline">
                            <h1>{{ $task->title }}</h1>
                            <span>Размещено в категории
                                <a href="/search?category_id={{ $task->category->id }}" class="link-regular">
                                    {{ $task->category->name }}
                                </a>
                                {{ $time_difference }}
                            </span>
                        </div>
                        <b class="new-task__price new-task__price--clean content-view-price">
                            {{ $task->budget }} <b>₽</b>
                        </b>
                        <div class="new-task__icon new-task__icon--clean content-view-icon"></div>
                    </div>
                    <div class="content-view__description">
                        <h3 class="content-view__h3">Общее описание</h3>
                        <p> {{ $task->description }} </p>
                    </div>
                    <div class="content-view__attach">
                        <h3 class="content-view__h3">Вложения</h3>
                        <div class="files">
                            @forelse($files as $file)
                                <a href="{{ route('file.download', ['fileId' => $file->id]) }}">
                                    {{ $file->alias }}
                                </a>
                            @empty
                                <p>Автор не прикрепил файлы к заданию</p>
                            @endforelse
                        </div>
                    </div>
                    <div class="content-view__location">
                        <h3 class="content-view__h3">Расположение</h3>
                        @if($coordinates !== null)
                            <div class="content-view__location-wrapper">
                                <div class="content-view__map">
                                    <div id="map"></div>
                                </div>
                                <div class="content-view__address">
                                    <span class="address__town">{{ $task->city->name }}</span><br>
                                    <span>{{ $task->location }}</span>
                                    <p>Срок выполнения: {{ $deadline }}</p>
                                </div>
                            </div>
                        @else
                            <p>Автор не указал адрес, работа считается удалённой.</p>
                            <p>Срок выполнения: {{ $deadline }}</p>
                        @endif
                    </div>
                </div>
                <div class="content-view__action-buttons">
                    @auth
                        @if ($auth_user_id === $task->user->id)
                            <button class="button button__big-color request-button open-modal" type="button"
                                data-for="complete-form">Завершить</button>
                        @elseif(!auth()->user()->feedbacks->contains('task_id', $task->id))
                            <button class=" button button__big-color response-button open-modal" type="button"
                                data-for="response-form">Откликнуться</button>
                            <button class="button button__big-color refusal-button open-modal" type="button"
                                data-for="refuse-form">Отказаться</button>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="content-view__feedback">
                <h2>Отклики <span>({{ $task->feedbacks->count() }})</span></h2>
                @forelse($task->feedbacks as $feedback)
                    <x-feedback :feedback="$feedback" auth_user_id="{{ $auth_user_id }}"></x-feedback>
                @empty
                    @if($auth_user_id !== $task->user->id)
                        <p class="pd-l-20">Ещё никто не оставлял отклики к этому заданию. Станьте первым!</p>
                    @else
                        <p class="pd-l-20">На данный момент нет у вашего задания нет откликов.</p>
                    @endif
                @endforelse
            </div>
        </section>
        <section class="connect-desk">
            <div class="connect-desk__profile-mini">
                <div class="profile-mini__wrapper">
                    <h3>Заказчик</h3>
                    <div class="profile-mini__top">
                        <img src="/img/avatar/{{ $task->user->avatar }}" width="62" height="62" alt="Аватар заказчика">
                        <div class="profile-mini__name five-stars__rate">
                            <p>{{ $task->user->name }}</p>
                        </div>
                    </div>
                    <p class="info-customer">
                        <span>{{ $task_amount }}</span>
                        <span class="last-">{{ $time_on_website }}</span>
                    </p>
                    <a href="{{ route('user.page', ['id' => $task->user->id]) }}" class="link-regular">Смотреть
                        профиль</a>
                </div>
            </div>
            @auth
                <div id="chat-container">
                    <chat class="connect-desk__chat" task="{{ $task->id }}"></chat>
                </div>
            @endauth
        </section>
    </div>
    @auth
        @if ($auth_user_id === $task->user->id)
            <x-completion-form></x-completion-form>
        @else
            <x-response-form taskId="{{ $task->id }}"></x-response-form>
            <x-refusal-form></x-refusal-form>
        @endif
    @endauth
@endsection
