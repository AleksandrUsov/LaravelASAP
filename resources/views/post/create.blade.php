@extends('admin.layouts.layout')

@section('content')
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form method="post" action="{{ route('admin.post.store') }}">
            @csrf
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Email
                </label>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="name" required="required" autofocus="autofocus">
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Email
                </label>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="name" required="required" autofocus="autofocus">
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Email
                </label>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="name" required="required" autofocus="autofocus">
            </div>
            <button type="submit">Сохранить</button>
        </form>

    </div>
@endsection
