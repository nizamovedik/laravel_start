@extends('layouts.admin.index')
@section('content')
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Полный текст</th>
                <th>Картинка</th>
                <th>Автор</th>
                <th>Разделы</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $one)
                <tr>
                    <td>{{ $one->id }}</td>
                    <td><a href="{{route('post.show', $one->id)}}">{{ $one->title }}</a></td>
                    <td>{{ $one->description }}</td>
                    <td>{{ Str::limit($one->content, 120, '...', true) }}</td>
                    <td><div class="avatar avatar-lg">
                            <img src="{{ $one->image }}">
                        </div></td>
                    <td>{{ $one->author->name . ' ' . $one->author->surname }}</td>
                    <td>
                        @foreach($one->sections as $section)
                            <span class="badge bg-light-info">{{ $section->title }}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{ $news->links() }}
        </div>
    </div>
@endsection
