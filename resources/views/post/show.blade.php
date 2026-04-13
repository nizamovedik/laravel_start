@extends('layouts.main')
@section('title', $post->title)

@section('content')
    <h1>{{$post->title}}</h1>
    <div>{{$post->content}}</div>
    <div>{{$post->category_id}}</div>
    <div>{{$post->tag_id}}</div>
    <div>{{$post->post_id}}</div>
    @if($post->image)
        <img src="{{$post->image}}" alt="{{$post->title}}">
    @endif
    <p>
        <a href="{{route('post.edit', $post->id)}}" class="btn btn-outline-secondary">Редактировать</a>
        <a href="{{route('post.index')}}" class="btn btn-outline-primary">Вернуться к списку постов</a>
    </p>
@endsection
