@extends('admin.layouts.layout')

@section('content')
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        @foreach($errors->all() as $error)
            <span class="text-red-300">{{ $error }} </span>
        @endforeach
        <form method="post" action="{{ route('admin.categories.update', $category) }}">
            @csrf
            @method('PUT')
            <label class="block font-medium text-sm text-gray-700" for="email">
                Title
            </label>
            <input
                value="{{ old('title', $category->title) }}"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                id="name" type="text"
                name="title"
                autofocus="autofocus">
            <button type="submit">Сохранить</button>
        </form>
@endsection
