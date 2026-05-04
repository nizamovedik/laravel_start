<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <ul class="navbar-nav">
        <li class="nav-item"><a href="{{route('main.index')}}" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="{{route('about.index')}}" class="nav-link">О нас</a></li>
        <li class="nav-item"><a href="{{route('post.index')}}" class="nav-link">Посты</a></li>
        @auth()
            <li class="nav-item"><a href="{{route('admin.index')}}" class="nav-link">Админка</a></li>
            <li class="nav-item">
                <a href="{{route('logout')}}"
                   class="nav-link"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
                >Выйти</a>
            </li>
        @endauth
        @guest()
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Авторизация</a></li>
        @endguest
    </ul>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
