<div class="content-view__feedback-wrapper">
  <div class="content-view__feedback-card">
      <div class="feedback-card__top">
          <a href="#"><img src="/img/avatar/{{ $data['feedback']->user->avatar }}" width="55" height="55"></a>
          <div class="feedback-card__top--name">
              <p><a href="#" class="link-regular">{{ $data['feedback']->user->name }}</a></p>
              <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
              <b>{{ $data['feedback']->user->rating }}</b>
          </div>
          <span class="new-task__time">{{ Carbon\Carbon::parse($data['feedback']->created_at)->diffForHumans() }}</span>
        </div>
        <div class="feedback-card__content">
            <p> {{ $data['feedback']->message }} </p>
            <span>{{ $data['feedback']->price }} ₽</span>
        </div>
        @auth
            @if($data['auth_user_id'] === $data['feedback']->task->user->id)
                <div class="feedback-card__actions">
                    <a class="button__small-color request-button button"
                            type="button">Подтвердить</a>
                    <a class="button__small-color refusal-button button"
                            type="button">Отказать</a>
                </div>
            @endif
        @endauth
  </div>
</div>