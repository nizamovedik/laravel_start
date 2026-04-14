<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="main container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="{{route('main.index')}}" class="nav-link">Главная</a></li>
            <li class="nav-item"><a href="{{route('about.index')}}" class="nav-link">О нас</a></li>
            <li class="nav-item"><a href="{{route('post.index')}}" class="nav-link">Посты</a></li>
        </ul>
    </nav>
    @section('sidebar')
        This is the master sidebar.
    @show

    @yield('content')
</div>
</body>
</html>
