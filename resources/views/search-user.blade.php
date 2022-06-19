@extends('layout')

@section('title', 'Результаты поиска')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container relative-container">
        <a class="dec-none" href="{{ route('users.page')}}">
            <button class="button absolute-button"><< Назад</button>
        </a>
        <section class="user__search">
            @forelse($users as $user)
                <x-user :user="$user"></x-user>
            @empty
                <p>Здесь пусто...</p>
            @endforelse
            {{ $users->appends(Illuminate\Support\Facades\Request::all())->links() }}
        </section>
    </div>
@endsection
