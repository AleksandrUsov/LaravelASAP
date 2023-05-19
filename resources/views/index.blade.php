@extends('layouts.layout')

@section('content')
    <h1 style="text-align: center">{{ $title }}</h1>

    <h2 style="text-align: center; color: #4b5563">{{ $subTitle }}</h2>

    <div class="posts" style="display: flex; justify-content: space-around">
        @foreach($posts as $post)
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h3>{{ $post['title'] }}</h3>
                <p>{{ $post['description'] }}</p>
                <span>Дата публикации: {{ $post['created_at'] }}</span>
            </div>
        @endforeach
    </div>
@endsection
