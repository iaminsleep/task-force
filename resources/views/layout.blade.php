<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  @yield('head')
  <link rel="stylesheet" href="/public/css/normalize.css"/>
  <link rel="stylesheet" href="/public/css/style.css">
  <link rel="icon" href="/img/taskforce-icon.png"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>
  <script src="/public/js/timezone.js" defer></script>
  <script src="/public/js/main.js" defer></script>
</head>
<body class="@yield('body-class')">
    <div class="table-layout">
      @if(\Request::is("/"))
        <x-header-landing></x-header-landing>
      @else
        <x-header></x-header>
      @endif
      <main class="@yield('main-class')">
        @yield('page-content')
      </main>
      @guest
          @include('login.index')
      @endguest
      <x-footer></x-footer>
      <div class="overlay"></div>
    </div>
</body>
@yield('scripts')
</html>
