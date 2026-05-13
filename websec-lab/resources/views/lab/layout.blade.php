<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'WebSec Lab')</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 42rem; margin: 2rem auto; padding: 0 1rem; line-height: 1.5; }
        a { color: #0b57d0; }
        code { background: #f2f2f2; padding: 0.1em 0.35em; border-radius: 4px; }
        .err { color: #b00020; }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
