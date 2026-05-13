@extends('lab.layout')

@section('title', 'Главная — WebSec Lab')

@section('content')
    <h1>Учебная лаборатория (намеренно уязвима)</h1>
    <p>Вы вошли как <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->email }}).</p>
    <ul>
        <li><a href="{{ route('search', ['q' => 'test']) }}">Поиск (reflected XSS)</a></li>
        <li><a href="{{ route('comments.index') }}">Комментарии (stored XSS)</a></li>
        <li><a href="{{ route('profile.edit') }}">Профиль (CSRF на смену email)</a></li>
        <li><a href="{{ route('lab.redirect', ['url' => url('/login')]) }}">Редирект с параметром <code>url</code></a></li>
        <li><a href="{{ route('lab.users.show', ['id' => 2]) }}">JSON профиля пользователя id=2 (IDOR — чужой email)</a></li>
    </ul>
    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Выйти</button>
    </form>
@endsection
