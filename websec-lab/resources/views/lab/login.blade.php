@extends('lab.layout')

@section('title', 'Вход')

@section('content')
    <h1>Вход</h1>
    <p>Демо: <code>alice@example.local</code> / <code>password</code></p>
    @if ($errors->any())
        <p class="err">{{ $errors->first() }}</p>
    @endif
    <form method="post" action="{{ route('login') }}">
        @csrf
        <p><label>Email<br><input type="email" name="email" value="{{ old('email') }}" required autocomplete="username"></label></p>
        <p><label>Пароль<br><input type="password" name="password" required autocomplete="current-password"></label></p>
        <p><label><input type="checkbox" name="remember" value="1"> Запомнить</label></p>
        <button type="submit">Войти</button>
    </form>
@endsection
