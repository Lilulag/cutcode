@extends('layout.app')

@section('title', 'Регистрация')

@section('content')

@include('partials.nav')
<div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Регистрация</h1>

        <form class="space-y-5 mt-5" action="{{ route('register_action') }}" method="post">
            @csrf

            <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Имя" />
            @error('name')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Email" />
            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <input name="password" type="password" class="w-full h-12 border border-gray-800 @error('password') border-red-500 @enderror rounded px-3" placeholder="Пароль" />
            @error('password')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <input name="password_confirmation" type="password" class="w-full h-12 border border-gray-800 @error('password.confirm') border-red-500 @enderror rounded px-3" placeholder="Подтверждение пароля" />
            @error('password_confirmation')
                <small class="text-red-500">{{ $message }}</small>
            @enderror

            <div>
                <a href="{{ route('login') }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Есть аккаунт?</a>
            </div>

            <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Зарегистрироваться</button>
        </form>
    </div>
</div>
