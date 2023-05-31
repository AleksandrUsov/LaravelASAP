@extends('admin.layouts.layout')
@section('content')
    <div class="flex justify-between">
        <h2 class="text-3xl text-gray-500">Удалённые статьи</h2>
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
                <span>Дата удаления: {{ $post->deleted_at }}</span>
                <form action="{{ route('admin.posts.restore-post', $post) }}" method="get">
                    @csrf
                    <button class="text-green-500 hover:text-indigo-700 hover:border-b border-red-700">
                        Восстановить
                    </button>
                </form>
            </div>
        @empty
            <h3>статей нет</h3>
        @endforelse
    </div>

@endsection