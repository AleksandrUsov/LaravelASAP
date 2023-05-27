@extends('admin.layouts.layout')
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @foreach($errors->all() as $error)
            <span class="text-red-300">{{ $error }} </span>
        @endforeach
        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <input type="text"
                   name="title"
                   placeholder="Категория"
                   value="{{old('title', '')}}"
                   id="title"
                   class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
            <input type="submit"
                   value="Сохранить"
                   class="mt-4 p-2 bg-blue-600 rounded-md hover:bg-blue-400">
        </form>
    </div>
@endsection
