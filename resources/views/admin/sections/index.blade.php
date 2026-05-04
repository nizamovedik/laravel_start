@extends('layouts.admin.index')
@section('content')
    <div id="app">
        <ul class="nav">
            <li class="nav-item">
                <router-link :to="{name: 'section.index'}" class="nav-link">Список</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{name: 'section.create'}" class="nav-link">Добавить</router-link>
            </li>
        </ul>
        <router-view></router-view>
    </div>
@endsection
