@extends('layouts.main')
@section('title', $post->title)

@section('content')
    <h1>{{$post->title}}</h1>
    <div>{{$post->content}}</div>
    <div>{{$post->category->title}}</div>
    <div>
        @foreach($post->tags as $tag)
            <span class="btn btn-sm btn-outline-info">{{$tag->title}}</span>
        @endforeach
    </div>
    <div>{{$post->post_id}}</div>
    @if($post->image)
        <img src="{{$post->image}}" alt="{{$post->title}}">
    @endif
    <p>
        @can('view', auth()->user())
        <a href="{{route('post.edit', $post->id)}}" class="btn btn-outline-secondary">Редактировать</a>
        @endcan
        <a href="{{route('post.index')}}" class="btn btn-outline-primary">Вернуться к списку постов</a>
    </p>
@endsection
