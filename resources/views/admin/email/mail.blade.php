@extends('admin.layouts.layout')

@section('content')
    <a href="{{ route('admin.mail.send', ['users' => $users]) }}" class="text-2xl text-green-500 font-bold">Отправить письма</a>
    @if (session('message'))
        <p class="text-green-500">
            {{ session('message') }}
        </p>
    @endif
    <div class="container mx-auto flex flex-wrap">
        @forelse($users as $user)
            <div class="lg:w-1/4 md:w-1/2 w-full p-4">
                <div class="p-8 rounded-xl shadow-md">
                    <h4 class="mb-2 text-lg font-semibold">{{ $user->name }}</h4>
                    <p class="text-base">{{ $user->email }}</p>
                </div>
            </div>
        @empty
            <h4>Нет пользователей</h4>
        @endforelse

    </div>
@endsection
