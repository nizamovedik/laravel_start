@extends('layouts.main')
@section('title', 'Создание')

@section('content')
    <form action="{{route('post.store')}}" method="post">
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-error-show type="warning">
                    <x-slot:info>Важно: </x-slot>
                    {{$error}}
                </x-error-show>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title"
                   name="title"
                   value="{{ old('title') }}">
            @error('title')
            <x-error-show>{{$error}}</x-error-show>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                      placeholder="description" name="description">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" placeholder="content"
                      name="content">{{ old('content') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Категории</label>
            <select class="form-select" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                            {{old('category_id') == $category->id ? ' selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Теги</label>
            <select class="form-select" id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="image"
                   name="image"
                   value="{{ old('image') }}">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
    {{--    <h1>{{$post->title}}</h1>--}}
    {{--    <p>{{$post->content}}</p>--}}
@endsection
