@extends('layout')

@section('title', 'Мой аккаунт')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        <section class="account__redaction-wrapper">
        <h1>Редактирование настроек профиля</h1>
            <form action="{{ route('account.change') }}" enctype="multipart/form-data" method="post">
                @method('PUT')
                @csrf
                <div class="account__redaction-section">
                    <h3 class="div-line">Настройки аккаунта</h3>
                    <div class="account__redaction-section-wrapper">
                        <div class="account__redaction-avatar">
                            <img src="/img/avatars/{{ $user->avatar }}" width="156" height="156">
                            <input type="file" name="avatar" id="upload-avatar">
                            <label for="upload-avatar" class="link-regular">Сменить аватар</label>
                            @error('avatar')
                                <span class="upload-error">{{ $errors->first('avatar') }}</span>
                            @enderror
                        </div>
                        <div class="account__redaction">
                            <div class="account__input account__input--name">
                                <label for="200">Ваше имя</label>
                                <input class="input textarea" id="200" name="name"
                                value="{{ $user->name }}" placeholder="Денис Титов">
                                @error('name')
                                    <span class="upload-error">{{ $errors->first('name') }}</span>
                                @enderror
                            </div>
                            <div class="account__input account__input--email" >
                                <label for="201">email</label>
                                <input class="input textarea" id="201" name="email"
                                value="{{ $user->email }}" placeholder="denis@email.com">
                                @error('email')
                                    <span class="upload-error">{{ $errors->first('email') }}</span>
                                @enderror
                            </div>
                            <div class="account__input account__input--name">
                                <label for="202">Город</label>
                                <select class="multiple-select input multiple-select-big" size="1" id="202" name="city_id">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if((int) $user->city_id === $city->id) selected @endif>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="account__input account__input--date">
                                <label for="203">День рождения</label>
                                <input id="203" class="input-middle input input-date" type="date" name="birth_date" value="{{ $user->birth_date }}">
                                @error('birth_date')
                                    <span class="upload-error">{{ $errors->first('birth_date') }}</span>
                                @enderror
                            </div>
                            <div class="account__input account__input--info">
                                <label for="204">Информация о себе</label>
                                <textarea class="input textarea" rows="7" id="204" name="description">{{ $user->description }}</textarea>
                                @error('description')
                                    <span class="upload-error">{{ $errors->first('description') }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h3 class="div-line">Выберите свои специализации</h3>
                    <div class="account__redaction-section-wrapper">
                    <div class="search-task__categories account_checkbox--bottom">
                        @foreach($categories as $category)
                            <input class="visually-hidden checkbox__input" id="{{ $category->alias }}" type="checkbox" name="specialization[]"
                            value="{{ $category->id }}" @if($user->specialization && in_array($category->id, json_decode($user->specialization, true))) checked @endif>
                            <label for="{{ $category->alias }}">{{ $category->name }}</label>
                        @endforeach
                    </div>
                    </div>
                    <h3 class="div-line">Безопасность</h3>
                    <div class="account__redaction-section-wrapper account__redaction">
                        <div class="account__input">
                            <label  for="211">Новый пароль</label>
                            <input class="input textarea" type="password" id="211" name="password">
                        </div>
                        <div class="account__input">
                            <label for="212">Повтор пароля</label>
                            <input class="input textarea" type="password" id="212" name="password_confirmation">
                            @error('password')
                                <span class="upload-error">{{ $errors->first('password') }}</span>
                            @enderror
                        </div>
                    </div>
                    <h3 class="div-line">Контакты</h3>
                    <div class="account__redaction-section-wrapper account__redaction">
                        <div class="account__input">
                            <label  for="213">Телефон</label>
                            <input class="input textarea" type="tel" id="213" name="phone"
                            value="{{ $user->phone }}" placeholder="8 (555) 187 44 87">
                            @error('phone')
                                <span class="upload-error">{{ $errors->first('phone') }}</span>
                            @enderror
                        </div>
                        <div class="account__input">
                            <label for="214">Skype</label>
                            <input class="input textarea" id="214" name="skype"
                            value="{{ $user->skype }}" placeholder="@DenisT">
                            @error('skype')
                                <span class="upload-error">{{ $errors->first('skype') }}</span>
                            @enderror
                        </div>
                    </div>
                    <h3 class="div-line">Настройки сайта</h3>
                    <h4>Уведомления</h4>
                    {{-- <div class="account__redaction-section-wrapper account_section--bottom">
                        <div class="search-task__categories account_checkbox--bottom">
                            <input class="visually-hidden checkbox__input" id="216" type="checkbox" name="" value="" checked>
                            <label for="216">Новое сообщение</label>
                            <input class="visually-hidden checkbox__input" id="217" type="checkbox" name="" value="" checked>
                            <label  for="217">Действия по заданию</label>
                            <input class="visually-hidden checkbox__input" id="218" type="checkbox" name="" value="" checked>
                            <label for="218">Новый отзыв</label>
                        </div>
                        <div class="search-task__categories account_checkbox account_checkbox--secrecy">
                            <input class="visually-hidden checkbox__input" id="219" type="checkbox" name="" value="">
                            <label for="219">Показывать мои контакты только заказчику</label>
                            <input class="visually-hidden checkbox__input" id="220" type="checkbox" name="" value="" checked>
                            <label  for="220">Не показывать мой профиль</label>
                        </div>
                    </div> --}}
                </div>
                <button class="button" type="submit">Сохранить изменения</button>
            </form>
        </section>
    </div>
@endsection
