@extends('admin.layouts.layout')
@section('content')
    <div class="flex justify-between">
        <h2 class="text-3xl text-gray-500">Категории</h2>
        <a href="{{ route('admin.categories.create') }}" class="text-3xl text-green-500 font-bold">+</a>
    </div>
    @if (session('message'))
        <p class="text-green-500">
            {{ session('message') }}
        </p>
    @endif
    <div class="flex content-around">
        @foreach($categories as $category)
            <div class="m-3 w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden">
                <h3>{{ $category->title }}</h3>
                <hr>
                <a class="text-indigo-500 hover:text-indigo-700 hover:border-b bord er-indigo-700"
                   href="{{ route('admin.categories.edit', $category) }}"> Редактировать </a>
                <br>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="text-red-500 hover:text-indigo-700 hover:border-b border-red-700">
                        Удалить
                    </button>
                </form>
            </div>
        @endforeach
    </div>
@endsection()
