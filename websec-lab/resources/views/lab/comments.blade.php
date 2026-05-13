@extends('lab.layout')

@section('title', 'Комментарии')

@section('content')
    <h1>Лента комментариев</h1>
    <ul>
        @forelse ($comments as $comment)
            <li>
                <strong>{{ $comment->user?->name ?? 'гость' }}</strong>
                ({{ $comment->created_at }}):
                {{-- Намеренно без экранирования (stored XSS) --}}
                {!! $comment->body !!}
            </li>
        @empty
            <li>Пока пусто</li>
        @endforelse
    </ul>

    <h2>Новый комментарий</h2>
    <form method="post" action="{{ route('comments.store') }}">
        @csrf
        <p><textarea name="body" rows="4" cols="60" required></textarea></p>
        <button type="submit">Отправить</button>
    </form>

    @auth
        <p><a href="{{ route('home') }}">На главную</a></p>
    @else
        <p><a href="{{ route('login') }}">Войти</a> (автор необязателен для лабы; user_id будет null)</p>
    @endauth
@endsection
