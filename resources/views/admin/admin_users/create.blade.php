@extends('layout.admin')

@section('title', isset($user) ? "Редактировать пользователя  {$user->name}" : 'Добавить администратора')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h3 class="text-gray-700 text-3xl font-medium mb-4">{{ isset($user) ? "Редактировать администратора  {$user->name}" : 'Добавить администратора' }}</h3>

            <form enctype="multipart/form-data" method="POST"
                  action="{{ isset($user) ? route("admin.admin_users.update", $user->name) : route("admin.admin_users.store") }}">
                @csrf

                @if(isset($user))
                    <input type="hidden" name="id" value="{{ $user->id }}"/>
                    @method('PUT')
                @endif

                <div class="mb-4">
                    <label for="email" class="block text-gray-600 text-sm mb-2">E-mail</label>
                    <input name="email" id="email" type="text"
                           class="w-full h-10 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror"
                           placeholder="E-mail" value="{{ $user->email ?? '' }}" required/>
                    @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-600 text-sm mb-2">Имя</label>
                    <input name="name" id="name" type="text"
                           class="w-full h-10 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror"
                           placeholder="Имя" value="{{ $user->name ?? '' }}" required/>
                    @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600 text-sm mb-2">Пароль</label>
                    <input name="password" id="password" type="password" autocomplete="new-password"
                           class="w-full h-10 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror"
                           placeholder="Пароль" value="" required/>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-600 text-sm mb-2">Подтверждение пароля</label>
                    <input name="password_confirmation" id="password_confirmation" type="password"
                           autocomplete="new-password"
                           class="w-full h-10 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror"
                           placeholder="Подтверждение пароля" value="" required/>
                    @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit"
                            class="w-full bg-blue-900 text-white py-2 rounded font-medium hover:bg-blue-700">Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
