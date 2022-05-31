@extends('layout')

@section('title', 'Результаты поиска')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container relative-container">
        <a class="dec-none" href="{{ route('browse.page')}}">
            <button class="button absolute-button"><< Назад</button>
        </a> 
        <section class="new-task">   
            <div class="new-task__wrapper">
                <h1>Результаты поиска</h1>
                @forelse($tasks as $task)
                    <x-task :task="$task"></x-task>
                @empty
                    <p>Ни одно задание не подошло под заданные фильтры! Попробуйте ещё раз.</p>
                @endforelse
            {{ $tasks->appends(Illuminate\Support\Facades\Request::all())->links() }}
        </section>
    </div>
@endsection