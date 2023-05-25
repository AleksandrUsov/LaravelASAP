@extends('admin.layouts.layout')

@section('content')
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        @foreach($errors->all() as $error)
            <span class="text-red-300">{{ $error }} </span>
        @endforeach
        <form method="post" action="{{ route('admin.posts.update', $post) }}">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Title
                </label>
                <input
                    value="{{ old('title', $post->title) }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="title" autofocus="autofocus">

            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Content
                </label>
                <input
                    value="{{ old('content', $post->content) }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="content"  autofocus="autofocus">
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    ID Автора
                </label>
                <input
                    disabled
                    value="{{ old('user_id', $post->user_id) }}"
                    class="bg-gray-300 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="user_id" required="required" autofocus="autofocus">
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="published_at">
                    Дата публикации
                </label>
                <input
                    value="{{ old('published_at', $post->published_at) }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="published_at" type="text" name="published_at" required="required" autofocus="autofocus">
            </div>

            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Отображать?
                </label>
                <input
                    hidden
                    value="0" name="is_visible" >
                <input
                    @checked(old('is_visible', $post->is_visible))
                    value="1"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1"
                    id="published_at" type="checkbox" name="is_visible"  autofocus="autofocus">
            </div>

            <button type="submit">Сохранить</button>
        </form>

    </div>
@endsection
