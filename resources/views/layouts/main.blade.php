<!doctype html>
<html lang="en" class="{{ request()->cookie('theme')?:'light' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/scss.scss', 'resources/js/app.js'])
</head>
<body>
<div class="main container">
    @include('layouts.menu')
    @section('sidebar')
        This is the master sidebar.
    @show
    @yield('content')
</div>
</body>
</html>
