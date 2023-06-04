@extends('admin.layouts.layout')

@section('content')

    <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @foreach($errors->all() as $error)
            <span class="text-red-300">{{ $error }} </span>
        @endforeach
        <form class="mx-auto"
              method="post"
              action="{{ route('admin.posts.store') }}">
            @csrf
            <div class="mt-5">
                <label
                    class="block font-medium text-sm text-gray-700"
                    for="title">
                    Title
                </label>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="title"
                    type="text"
                    name="title"
                    autofocus="autofocus">

            </div>
            <div class="mt-5">
                <label class="block font-medium text-sm text-gray-700" for="content">
                    Content
                </label>
                <textarea
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="content"
                    type="text"
                    name="content"
                    autofocus="autofocus"></textarea>
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700"
                       for="email">
                    Автор
                </label>
                <select
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name"
                    name="user_id"
                    type="text"
                    required="required"
                    autofocus="autofocus">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-5">
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
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-5">
                <label class="block font-medium text-sm text-gray-700" for="published_at">
                    Дата публикации
                </label>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="published_at" type="date" name="published_at" required="required" autofocus="autofocus">
            </div>
            <div class="mt-5">
                <label class="block font-medium text-sm text-gray-700" for="visible">
                    Отображать?
                </label>
                <input
                    hidden
                    value="0" name="is_visible">
                <input
                    value="1"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1"
                    id="visible" type="checkbox" name="is_visible" autofocus="autofocus">
            </div>

            <button class="mt-10 p-3 bg-blue-600 rounded-md hover:bg-blue-400" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
