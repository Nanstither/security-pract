@extends('lab.layout')

@section('title', 'Поиск')

@section('content')
    <h1>Поиск</h1>
    {{-- Намеренно без экранирования (reflected XSS) --}}
    <p>Вы искали: {!! $q !!}</p>
    @auth
        <p><a href="{{ route('home') }}">На главную</a></p>
    @else
        <p><a href="{{ route('login') }}">На страницу входа</a></p>
    @endauth
@endsection
