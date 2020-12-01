@extends('layouts.app')

@section('title')
    <title>Регистрация</title>
@endsection

@section('body')
    <h1 class="display-4 text-center">Регистрация</h1>
    <a href="{{ route('login.form') }}" class="d-block text-center">Вход</a>
    <main>
        <form action="{{ route('register.register') }}" method="post" class="w-50 ml-auto mr-auto">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                >
                @error('name')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                >
                @error('email')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation">Повторите пароль</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
        </form>
    </main>
@endsection
