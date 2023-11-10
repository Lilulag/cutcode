@extends('layout.app')

@section('title', 'Восстановление')

@section('content')

@include('partials.nav')

<div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Восстановление пароля</h1>

        <form class="space-y-5 mt-5" action="{{ route('forgot_action') }}" method="post">
            @csrf

            <input name="email" type="text" class="w-full h-12 border @error('email') border-red-500 @enderror rounded px-3" placeholder="Email" />
            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror

            <div>
                <a href="{{ route('login') }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Вспомнил пароль</a>
            </div>

            <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Восстановить</button>
        </form>
    </div>
</div>
