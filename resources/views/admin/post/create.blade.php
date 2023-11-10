@extends('admin.layout.app')

@section('title', 'Создать пост')

@section('content')

    @include('admin.partials.nav')

    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
            <div class="flex items-center">
                <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>

            <div class="flex items-center">
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = ! dropdownOpen"
                            class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                        <img class="h-full w-full object-cover"
                             src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=296&amp;q=80"
                             alt="Your avatar">
                    </button>

                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                         style="display: none;"></div>

                    <div x-show="dropdownOpen"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                         style="display: none;">
                        <a href="/login"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Выйти</a>
                    </div>
                </div>
            </div>
        </header>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-gray-700 text-3xl font-medium">Редактировать пост</h3>

                <div class="mt-8"></div>

                <div class="mt-8">
                    <form class="space-y-5 mt-5"
                          method="post"
                          enctype="multipart/form-data"
                          action="{{ route('admin.posts.store') }}"
                    >
                        @csrf

                        <input name="title" type="text"
                               value="{{ old('title') }}"
                               class="w-full h-12 border border-gray-800 rounded px-3"
                               placeholder="Название" />

                        <input name="preview" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Превью" />

                        <input name="description" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Описание" />

                        <div>
{{--                            <img class="h-64 w-64">--}}
                        </div>

                        <input name="thumbnail" type="file" class="w-full h-12" placeholder="Изображение" />

                        <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    @include('admin.partials.navend')

@endsection
