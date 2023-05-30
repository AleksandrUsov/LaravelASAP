@extends('admin.layouts.layout')
@section('content')
    <div class="flex justify-between">
        <h2 class="text-3xl text-gray-500">Статьи</h2>
        <form action="{{ route('admin.posts.drop') }}" method="post">
            @csrf
            @method('DELETE')
            <button class="text-3xl text-red-500 font-bold">×</button>
        </form>
        <a href="{{ route('admin.posts.create') }}" class="text-3xl text-green-500 font-bold">+</a>
    </div>
    @if (session('message'))
        <p class="text-green-500">
            {{ session('message') }}
        </p>
    @endif
    <div class="flex content-around">
        @forelse($posts as $post)
            <div class="m-3 w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <p>{{ $post->category?->title }}</p>
                <span>Дата публикации: {{ $post->published_at }}</span>
                <a class="text-indigo-500 hover:text-indigo-700 hover:border-b bord er-indigo-700"
                   href="{{ route('admin.posts.edit', $post) }}"> Редактировать </a>
                <br>
                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="text-red-500 hover:text-indigo-700 hover:border-b border-red-700">
                        Удалить
                    </button>
                </form>
            </div>
        @empty
            <h3>статей нет</h3>
        @endforelse
    </div>

@endsection
