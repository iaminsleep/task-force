@include('include.header')
    <main class="page-main">
        <div class="main-container page-container relative-container">
            <a class="dec-none" href="{{ route('browse.page')}}">
              <button class="button absolute-button"><< Назад</button>
            </a> 
            <section class="new-task">   
                <div class="new-task__wrapper">
                    <h1>Результаты поиска</h1>
                    @if($tasks->isNotEmpty())
                        @foreach($tasks as $task)
                            <x-task :task="$task"></x-task>
                        @endforeach
                    @else
                        <p>Ни одно задание не подошло под заданные фильтры! Попробуйте ещё раз.</p>
                    @endif
                {{ $tasks->appends(Illuminate\Support\Facades\Request::all())->links() }}
            </section>
        </div>
    </main>
@guest
    @include('auth.signin')
@endguest
@include('include.footer')