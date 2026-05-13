@extends('lab.layout')

@section('title', 'Профиль')

@section('content')
    <h1>Профиль</h1>
    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif
    <p>{{ $user->name }} — текущий email: {{ $user->email }}</p>

    <h2>Сменить email</h2>
    <p>Форма <strong>без</strong> CSRF-токена (маршрут исключён из проверки для лабораторной работы).</p>
    <form method="post" action="{{ route('profile.email') }}">
        <p><label>Новый email<br><input type="email" name="email" required></label></p>
        <button type="submit">Сохранить</button>
    </form>

    <p><a href="{{ route('home') }}">На главную</a></p>
@endsection
