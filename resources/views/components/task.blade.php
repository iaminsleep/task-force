<div class="new-task__card">
  <div class="new-task__title">
      <a href="{{ route('task.show', ['id' => $task->id]) }}" class="link-regular"><h2>{{ $task->title }}</h2></a>
      <form method="get" action="/search" id="form-id">
        <a class="new-task__type link-regular" onclick="this.closest('#form-id').submit()">
          <p>{{ $task->category->name }}</p>
          <input type="hidden" name="category_id" value="{{ $task->category->id }}"/>
        </a>
      </form>
  </div>
  <div class="new-task__icon new-task__icon--{{ $task->category->alias }}"></div>
  <p class="new-task_description">{{ $task->description }}</p>
  <b class="new-task__price new-task__price--translation">{{  $task->budget }}<b> ₽</b></b>
  <p class="new-task__place">{{ $task->city->name }}, {{ $task->location }}</p>
  <span class="new-task__time">{{ Carbon\Carbon::parse($task->created_at)->diffForHumans() }}</span>
</div>