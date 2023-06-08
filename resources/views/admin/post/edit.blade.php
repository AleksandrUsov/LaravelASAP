@extends('admin.layouts.layout')

@section('content')
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        @foreach($errors->all() as $error)
            <span class="text-red-300">{{ $error }} </span>
        @endforeach
        <form method="post"
              action="{{ route('admin.posts.update', $post) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-medium text-sm text-gray-700" for="title">
                    Title
                </label>
                <input
                    value="{{ old('title', $post->title) }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="title"
                    type="text"
                    name="title"
                    autofocus="autofocus">
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="content">
                    Content
                </label>
                <input
                    value="{{ old('content', $post->content) }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="content"
                    type="text"
                    name="content"
                    autofocus="autofocus">
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="author">
                    Автор
                </label>
                <select
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="author"
                    name="user_id"
                    type="text"
                    required="required"
                    autofocus="autofocus">
                    @foreach($users as $user)
                        <option
                            @selected(old('user_id', $post->user_id) == $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="category">
                    Категория
                </label>
                <select
                    id="category"
                    name="category_id"
                    required="required"
                    autofocus="autofocus"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1
                    w-full">
                    @foreach($categories as $category)
                        <option
                            @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="published_at">
                    Дата публикации
                </label>
                <input
                    value="{{ old('published_at', $post->published_at) }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="published_at"
                    type="text"
                    name="published_at"
                    required="required"
                    autofocus="autofocus">
            </div>
            <div class="flex">
                @forelse($images as $image)
                    <img src="{{asset('storage/images/' . $image->hash_name)}}"
                    style="height: 200px; width: 200px">
                @empty
                    <p>Нет изображений</p>
                @endforelse
            </div>
            <div class="mt-5">
                <input name="files[]" multiple type="file" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm block mt-1 w-full">
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Отображать?
                </label>
                <input
                    hidden
                    value="0" name="is_visible">
                <input
                    @checked(old('is_visible', $post->is_visible))
                    value="1"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1"
                    id="published_at"
                    type="checkbox"
                    name="is_visible"
                    autofocus="autofocus">
            </div>

            <button type="submit">Сохранить</button>
        </form>

    </div>
@endsection
