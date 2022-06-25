<div class="content-view__action-buttons">
    @auth
        @if (auth()->user()->id === $task->user->id)
            <button class="button button__big-color request-button open-modal" type="button"
                data-for="complete-form">Завершить</button>
        @elseif(!auth()->user()->responses->contains('task_id', $task->id) && auth()->user()->id !== $task->performer_id)
            <button class="button button__big-color response-button open-modal" type="button"
                data-for="response-form">Откликнуться</button>
        @elseif(auth()->user()->id === $task->performer_id)
            <button class="button button__big-color refusal-button open-modal" type="button"
                data-for="refuse-form">Отказаться</button>
        @endif
    @endauth
</div>
