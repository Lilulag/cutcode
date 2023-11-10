@extends('layout.app')

@section('title', 'Авторизация администратора')

@section('content')

@include('partials.nav')
<div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Вход администратора</h1>

        <form class="space-y-5 mt-5" action="{{ route('admin.login_action') }}" method="post">
            @csrf

            <input name="email" type="text" class="w-full h-12 border border-gray-800 @error('email') border-red-500 @enderror rounded px-3" placeholder="Email" />
            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <input name="password" type="password" class="w-full h-12 border border-gray-800 @error('admin_email') border-red-500 @enderror rounded px-3" placeholder="Пароль" />
            @error('password')
                <small class="text-red-500">{{ $message }}</small>
            @enderror

            <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Войти</button>
        </form>
    </div>
</div>
