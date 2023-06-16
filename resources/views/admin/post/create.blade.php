@extends('admin.layouts.layout')

@section('content')

    <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @foreach($errors->all() as $error)
            <span class="text-red-300">{{ $error }} </span>
        @endforeach

        <x-general.form
            method="post"
            action="{{ route('admin.posts.store') }}"
            enctype="multipart/form-data"
        >
            <x-general.form.item>
                <x-general.form.input
                    value="{{ old('title', '') }}"
                    type="text"
                    name="title"
                >
                    Title
                </x-general.form.input>
            </x-general.form.item>

            <x-general.form.input
                value="{{ old('content', '') }}"
                type="text"
                name="content"
            >
                Content
            </x-general.form.input>

            <x-general.form.item>
                <x-general.form.label
                    for="user_id"
                >
                    Автор
                </x-general.form.label>

                <x-general.form.select name="user_id">
                    @foreach($users as $user)
                        <option
                            @selected(old('user_id') == $user->id)
                            value="{{ $user->id }}">{{ $user->name }}
                        </option>
                    @endforeach
                </x-general.form.select>

            </x-general.form.item>

            <x-general.form.item>
                <x-general.form.label for="category_id">
                    Категория
                </x-general.form.label>
                <x-general.form.select name="category_id">
                    @foreach($categories as $category)
                        <option
                            @selected(old('category_id') == $category->id)
                            value="{{ $category->id }}">{{ $category->title }}
                        </option>
                    @endforeach
                </x-general.form.select>
            </x-general.form.item>

            <x-general.form.item>
                <label
                    class="block font-medium text-sm text-gray-700"
                    for="published_at"
                >
                    Дата публикации
                </label>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="published_at"
                    type="date"
                    name="published_at"
                    required="required"
                    autofocus="autofocus"
                >
            </x-general.form.item>

            <x-general.form.item>
                <input
                    name="files[]"
                    multiple
                    type="file"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm block mt-1 w-full"
                >
            </x-general.form.item>
            <x-general.form.item>
                <label
                    class="block font-medium text-sm text-gray-700"
                    for="visible"
                >
                    Отображать?
                </label>
                <input
                    hidden
                    value="0"
                    name="is_visible"
                >
                <input
                    value="1"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1"
                    id="visible"
                    type="checkbox"
                    name="is_visible"
                    autofocus="autofocus"
                >
            </x-general.form.item>

            <x-general.form.button>Сохранить</x-general.form.button>
        </x-general.form>
    </div>
@endsection
