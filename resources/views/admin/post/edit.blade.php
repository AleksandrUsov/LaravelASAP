@extends('admin.layouts.layout')

@section('content')

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form method="post" action="{{ route('admin.posts.update', $post->id) }}">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            <span class="@if(session('success'))text-green-500 @else text-red-500 @endif">
                @if(session('success'))
                    Запись обновлена
                @endif
                @if(session('success') === false)
                    Ошибка обновления
                @endif
            </span>
            @csrf
            @method('PUT')
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Title
                </label>
                <input
                    value="{{ $post->title }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="title" autofocus="autofocus">

            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Content
                </label>
                <input
                    value="{{ $post->content }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="content"  autofocus="autofocus">
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    ID Автора
                </label>
                <input
                    disabled
                    value="{{ $post->user_id }}"
                    class="bg-gray-300 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="user_id" required="required" autofocus="autofocus">
            </div>
            <button type="submit">Сохранить</button>
        </form>

    </div>
@endsection
