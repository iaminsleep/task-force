@include('include.header')
    <main class="page-main">
        <div class="main-container page-container">
            <section class="new-task">
                <div class="new-task__wrapper">
                    <h1>Новые задания</h1>
                    @if($tasks->isNotEmpty())
                        @foreach($tasks as $task)
                            <x-task :task="$task"></x-task>
                        @endforeach
                    @else
                        <p>На данный момент активных заданий нет!</p>
                    @endif
                {{ $tasks->links() }}
            </section>
            <section class="search-task">
                <div class="search-task__wrapper">
                    <form class="search-task__form" method="get" action="/search">
                        <fieldset class="search-task__categories">
                            <legend>Категории</legend>
                            @foreach($categories as $category)
                                <input class="visually-hidden checkbox__input" id="{{ $category->id }}" type="checkbox" 
                                name="category[]" value="{{ $category->id }}"/>
                                <label for="{{ $category->id }}">{{ $category->name }}</label>
                            @endforeach
                        </fieldset>
                        <fieldset class="search-task__categories">
                            <legend>Дополнительно</legend>
                            @foreach($optional_filters as $optional_filter)
                                <input class="visually-hidden checkbox__input" id="{{ $optional_filter['alias'] }}" 
                                type="checkbox" name="{{ $optional_filter['alias'] }}"/>
                                <label for="{{ $optional_filter['alias'] }}">{{ $optional_filter['name'] }}</label>
                            @endforeach
                        </fieldset>
                       <label class="search-task__name" for="period">Период</label>
                           <select class="multiple-select input" id="period" size="1" name="time">
                               <option disabled selected>Без периода</option>
                                @foreach($time_filters as $time_filter)
                                    <option value="{{ $time_filter['alias']}}">{{ $time_filter['name'] }}</option>
                                @endforeach
                        </select>
                        <label class="search-task__name" for="search">Поиск по названию</label>
                        <input class="input-middle input" id="search" type="search" name="name" 
                        placeholder="Перевести книгу" autocomplete="off" value="">
                        <button class="button" type="submit">Искать</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
@guest
    @include('auth.signin')
@endguest
@include('include.footer')
