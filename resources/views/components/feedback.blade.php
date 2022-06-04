@php
  $timezone = $_COOKIE['timezone'] ?? config('timezone');
  $userPageLink = route('user.page', ['id' => $feedback->user->id]);
  $time_difference = Carbon\Carbon::parse($feedback->created_at)->timezone($timezone)->diffForHumans()
@endphp

@props(['feedback'])

<div class="content-view__feedback-wrapper">
  <div class="content-view__feedback-card">
        <div class="feedback-card__top">
            <a href="{{ $userPageLink }}">
                <img src="/img/avatar/{{ $feedback->user->avatar }}" width="55" height="55">
            </a>
            <div class="feedback-card__top--name">
                <p>
                    <a href="{{ $userPageLink }}" class="link-regular">
                        {{ $feedback->user->name }}
                    </a>
                </p>
              <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
              <b>{{ $feedback->user->rating }}</b>
            </div>
            <span class="new-task__time">
                {{ $time_difference }}
            </span>
        </div>
        <div class="feedback-card__content">
            <p> {{ $feedback->comment }} </p>
            <span>{{ $feedback->payment }} ₽</span>
        </div>
        @auth
            @if(auth()->user()->id === $feedback->task->user->id)
                <div class="feedback-card__actions">
                    <a class="button__small-color request-button button"
                            type="button">Подтвердить</a>
                    <a class="button__small-color refusal-button button"
                            type="button">Отказать</a>
                </div>
            @elseif(auth()->user()->id === $feedback->user_id)
                <div class="feedback-card__actions">
                    <form action="{{ route('feedback.delete', ['feedbackId' => $feedback->id]) }}" method="post">
                        @method('DELETE')
                        <button class="button__small-color refusal-button button" type="submit">
                            Удалить отклик
                        </button>
                        @csrf
                    </form>
                </div>
            @endif
        @endauth
  </div>
</div>
