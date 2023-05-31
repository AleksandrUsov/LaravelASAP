@extends('admin.layouts.layout')
@section('content')
    <div class="flex justify-between">
        <div class="flex justify-start space-x-8">
            <h2 class="text-3xl text-gray-500">Статьи</h2>
            <form action="{{ route('admin.posts.index')}}" method="get" class="inline-flex space-x-8">
                <select name="category_id"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block">
                    <option selected hidden="hidden" disabled>Категория</option>
                    @foreach($categories as $category)
                        <option @selected(old('category_id', request()->get('category_id')) == $category->id)
                                value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <select name="user_id"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block">
                    <option selected hidden="hidden" disabled>Автор</option>
                    @foreach($users as $user)
                        <option @selected(old('user_id', request()->get('user_id')) == $user->id)
                            value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <button class="p-3 bg-blue-600 rounded-md hover:bg-blue-400">Применить</button>
                <a href="{{ route('admin.posts.index') }}" class="p-3 rounded-md bg-gray-100">Сбросить фильтры</a>
            </form>
        </div>
        <div class="flex justify-end space-x-8">
            <form action="{{ route('admin.posts.drop') }}" method="post">
                @csrf
                @method('DELETE')
                <button class="text-3xl text-red-500 font-bold">×</button>
            </form>
            <a href="{{ route('admin.posts.create') }}" class="text-3xl text-green-500 font-bold">+</a>
        </div>
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
                <p>{{ $post->category->title ?? 'Без категории'}}</p>
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
