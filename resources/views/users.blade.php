@extends('layout')

@section('title', 'Исполнители')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        <section class="user__search">
            <div class="user__search-link">
                <p>Сортировать по:</p>
                <ul class="user__search-list">
                    @foreach($main_filters as $filter)
                        <li class="user__search-item user__search-item--current">
                            <a href="/search-user?{{ $filter['alias'] }}=on" class="link-regular">
                                {{ $filter['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @forelse($users as $user)
                <x-user :user="$user"></x-user>
            @empty
                <p>Здесь пусто...</p>
            @endforelse
            {{  $users->links() }}
        </section>
        <section class="search-task">
            <div class="search-task__wrapper">
                <form class="search-task__form" method="get" action="{{ route('user.search') }}">

                    <fieldset class="search-task__categories">
                        <legend>Категории</legend>
                        @foreach ($categories as $category)
                            <input class="visually-hidden checkbox__input" id="{{ $category->id }}" type="checkbox"
                                name="specialization[]" value="{{ $category->id - 1 }}" />
                            <label for="{{ $category->id }}">{{ $category->name }}</label>
                        @endforeach
                    </fieldset>

                    <fieldset class="search-task__categories">
                        <legend>Дополнительно</legend>
                        @foreach($optional_filters as $filter)
                            <input class="visually-hidden checkbox__input" id="{{ $filter["alias"] }}" type="checkbox" name="{{ $filter["alias"] }}">
                            <label for="{{ $filter["alias"] }}">{{ $filter["name"] }}</label>
                        @endforeach
                        @auth
                            <input class="visually-hidden checkbox__input" id="in_favourites" type="checkbox" name="in_favourites">
                            <label for="in_favourites">В избранном</label>
                        @endauth
                    </fieldset>

                    <label class="search-task__name" for="110">Поиск по имени</label>
                    <input class="input-middle input" id="110" type="search" name="name" placeholder="Иван Иванов">

                    <button class="button" type="submit">Искать</button>
                </form>
            </div>
        </section>
    </div>
@endsection
