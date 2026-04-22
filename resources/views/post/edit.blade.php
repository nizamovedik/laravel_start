@extends('layouts.main')
@section('title', 'Редактирование')

@section('content')
    <p>Редактирование: {{$post->title}}</p>
    <form action="{{route('post.update', $post)}}" method="post">
        @csrf
        @method('PATCH')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title"
                   name="title"
                   value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                      placeholder="description" name="description">{{ $post->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" placeholder="content"
                      name="content">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Категории</label>
            <select class="form-select" aria-label="Default select example" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if($post->category_id === $category->id) selected @endif>{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Теги</label>
            <select class="form-select" aria-label="Default select example" id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option
                        value="{{$tag->id}}"
                    @foreach($post->tags as $postTag)
                        {{$postTag->id === $tag->id ?'selected':''}}
                        @endforeach
                    >
                        {{$tag->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="image"
                   name="image"
                   value="{{ $post->image }}">
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
    {{--    <h1>{{$post->title}}</h1>--}}
    {{--    <p>{{$post->content}}</p>--}}
@endsection
