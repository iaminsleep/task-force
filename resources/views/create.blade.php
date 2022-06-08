@extends('layout')

@section('title', 'Опубликовать задание')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection

@section('main-class', 'page-main')

@section('scripts')
    {{-- Dropzone --}}
    <script src="js/dropzone.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        const csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;
        let uploadedDocumentMap = {};
        var dropzone = new Dropzone("div.create__file", {
            url: "files/upload",
            paramName: "file",
            addRemoveLinks: true,
            timeout: 5000,
            maxFilesize: 5, //MB
            maxFiles: 5,
            previewsContainer: ".dropzone-previews",
            createImageThumbnail: true,
            init: function() {
                this.on("maxfilesexceeded", function(file) {
                    alert("Достигнут лимит файлов.");
                    this.removeFile(file);
                    file.previewElement.remove();
                });
                this.on("addedfile", function(file) {
                    const errorMsg = document.querySelector('.upload-error')
                    if(errorMsg) errorMsg.remove();
                });
            },
            success: function(file, response) {
                document.querySelector('.create__task-form')
                    .insertAdjacentHTML('beforeend',
                        '<input type="hidden" name="files[]" value="'
                            + response.folder +
                        '" data-filename="'+ response.alias +'"/>'
                    );
                uploadedDocumentMap[file.name] = response.alias;
            },
            error: function(file, response) {
                if(response.errors) {
                    file.previewElement.remove();
                    document.querySelector('.dropzone-previews')
                    .insertAdjacentHTML('afterend',
                        `<p class="upload-error">${response.message}</p>`
                    );
                }
                return false;
            },
            removedfile: function (file) {
                let name = '';

                if (typeof file.name !== 'undefined')
                    name = file.name;
                else
                    name = uploadedDocumentMap[file.name];

                const fileInput = document.querySelector('.create__task-form')
                    .querySelector('input[name="files[]"][data-filename="'+ name +'"]');

                if(fileInput) {
                    const folderToDelete = fileInput.value;

                    //Remove file from the server using AJAX library
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': csrf_token,
                        },
                        type: 'POST',
                        url: 'files/delete',
                        data: {
                            folderName: folderToDelete,
                        },
                        success: function (data) {
                            file.previewElement.remove();
                            fileInput.remove();
                        },
                        error: function(e) {
                            console.log(e);
                        }}
                    );
                }
            },
            headers: {
                'X-CSRF-TOKEN': csrf_token,
            },
        });
    </script>
@endsection

@section('page-content')
    <div class="main-container page-container">
        <section class="create__task">
            <h1>Публикация нового задания</h1>
            <div class="create__task-main">
                <form class="create__task-form form-create" method="post" action="{{ route('task-create.perform') }}"
                    enctype="multipart/form-data" id="task-form">
                    @csrf
                    <label for="10">Мне нужно</label>
                    <input class="input textarea" rows="1" id="10" name="title" placeholder="Повесить полку" value="{{ old('title') }}"/>

                    <span>Кратко опишите суть работы</span>
                    <label for="11">Подробности задания</label>
                    <input class="input textarea" rows="7" id="11" name="description" placeholder="Срочная работа" value="{{ old('description') }}"/>
                    <span>Укажите все пожелания и детали, чтобы исполнителям было проще соориентироваться</span>

                    <label for="12">Категория</label>
                    <select class="multiple-select input multiple-select-big" id="12" size="1" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if((int) old('category_id') === $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <span>Выберите категорию</span>

                    <label>Файлы</label>
                    <span>Загрузите файлы, которые помогут исполнителю лучше выполнить или оценить работу</span>
                    <div class="dropzone create__file">
                        <div class="dz-default dz-message">
                            <span>Добавить новый файл</span>
                        </div>
                    </div>
                    <div class="dropzone dropzone-previews"></div>

                    <label for="13">Адрес</label>
                    <input class="input-navigation input-middle input" id="13" type="search" name="location"
                        placeholder="Калининский район, 22" value="{{ old('location') }}"/>
                    <span>Укажите адрес исполнения, если задание требует присутствия</span>

                    <div class="create__price-time">
                        <div class="create__price-time--wrapper">
                            <label for="14">Бюджет</label>
                            <input class="input textarea input-money" rows="1" id="14" name="budget" placeholder="1000" value="{{ old('budget') }}"/>
                            <span>Укажите, сколько вы готовы заплатить</span>
                        </div>
                        <div class="create__price-time--wrapper">
                            <label for="15">Срок исполнения</label>
                            <input id="15" class="input-middle input input-date" type="date" name="deadline" value="{{ old('deadline') }}"/>
                            <span>Укажите крайний срок исполнения</span>
                        </div>
                    </div>
                </form>
                <div class="create__warnings">
                    <div class="warning-item warning-item--advice">
                        <h2>Правила хорошего описания</h2>
                        <h3>Подробности</h3>
                        <p>Друзья, не используйте случайный<br>
                            контент – ни наш, ни чей-либо еще. Заполняйте свои
                            макеты, вайрфреймы, мокапы и прототипы реальным
                            содержимым.</p>
                        <h3>Файлы</h3>
                        <p>Если загружаете фотографии объекта, то убедитесь,
                            что всё в фокусе, а фото показывает объект со всех
                            ракурсов.</p>
                        <h3>Адрес</h3>
                        <p>Пишите настоящий адрес, чтобы исполнитель смог <br>
                            вас найти. В случае указания недостоверного адреса
                            пользователи имеют право пожаловаться на вашу публикацию.
                            Если их правота будет доказана, то вы будете
                            заблокированы за нарушение правил.</p>
                    </div>
                    @if ($errors->any())
                        <div class="warning-item warning-item--error">
                            <h2>Ошибки заполнения формы</h2>
                            @foreach($errors_array as $error)
                                @error($error['alias'])
                                    <h3>{{ $error['name'] }}</h3>
                                    <p>{{ $errors->first($error['alias']) }}<br>
                                @enderror
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <button form="task-form" class="button" type="submit">Опубликовать</button>
        </section>
    </div>
@endsection
