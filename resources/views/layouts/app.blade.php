<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('title')
        <title>Contacts</title>
    @show
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<div class="container pt-5">
    @auth
        <header class="pb-3 border-bottom d-flex justify-content-around">
            <a href="{{ route('main') }}" class="mt-2">Все контакты</a>
            <a href="{{ route('favorites') }}" class="mt-2">Избранное</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">выйти</button>
            </form>
        </header>
    @endauth
    @yield('body')
</div>
</body>
</html>
