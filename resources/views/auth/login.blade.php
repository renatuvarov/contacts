@extends('layouts.app')

@section('title')
    <title>Вход</title>
@endsection

@section('body')
    <h1 class="display-4 text-center">Вход</h1>
    <a href="{{ route('register.form') }}" class="d-block text-center">Регистрация</a>
    <main class="mt-3">
        @include('_messages')
        <form action="{{ route('login.login') }}" method="post" class="w-50 ml-auto mr-auto">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                >
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       id="password"
                       name="password"
                >
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </main>
@endsection
