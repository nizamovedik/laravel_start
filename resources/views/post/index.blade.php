@extends('layouts.main')
@section('title', 'Posts')

@section('sidebar')
    @parent
    new sidebar
@endsection

@section('content')
    <hr>
    @auth()
        <a href="{{route('post.create')}}" class="btn btn-outline-success">Добавить новый пост</a>
        <hr>
    @endauth
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->description}}</p>
                        <a href="{{route('post.show', $post->id)}}" class="btn btn-outline-primary">Детальная
                            страница</a>
                        @auth()
                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-outline-secondary btn-sm">Редактировать</a>
                            <form action="{{route('post.delete', $post->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-outline-danger btn-sm" type="submit" value="Удалить"/>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
