<section class="search-task">
    <div class="search-task__wrapper">
        <form class="search-task__form" method="get" action="{{ route('task.search') }}">
            @include('browse.partials.category-filters')
            @include('browse.partials.optional-filters')
            @include('browse.partials.time-filters')
            @include('browse.partials.name-filter')
            <button class="button" type="submit">Искать</button>
        </form>
    </div>
</section>
