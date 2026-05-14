# Практическая работа: безопасность веб-приложений (Laravel)

**Важно:** приложение в каталоге `websec-lab` намеренно содержит уязвимости. Запускайте только на `localhost`.

## Подготовка

```bash
cd websec-lab
composer install
copy .env.example .env   # при первом клоне, если нет .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Откройте http://127.0.0.1:8000/login  

Учётные записи после сидера:

| Email | Пароль |
|--------|--------|
| alice@example.local | password |
| bob@example.local | bob123 |
| admin@example.local | admin |

Для демонстрации CSRF из другого origin в `.env` заданы `SESSION_SAME_SITE=none` и `SESSION_SECURE_COOKIE=false`.

## Задания

### 1. Reflected XSS

Маршрут: `GET /search?q=...`  

Задача: составить payload, который при открытии ссылки выполняет произвольный JavaScript в браузере жертвы (например `alert(document.domain)`).  

В отчёте: URL целиком, объяснение, почему сработало, как исправить (экранирование, Content-Type, CSP).

![PNG](/websec-lab/Reflected%20XSS.png)

### 2. Stored XSS

Раздел «Комментарии»: публикация комментария с HTML/скриптом.  

Задача: оставить комментарий, который при просмотре ленты выполняется у любого посетителя страницы. Показать влияние на сессию (например вывод cookie с флагом `HttpOnly` — что удаётся/не удаётся и почему).  

В отчёте: payload, место в коде (Blade), исправление (`{{ }}` vs `{!! !!}`, санитизация, Markdown с ограничениями).

### 3. CSRF

Страница профиля меняет email через `POST /profile/email` **без** CSRF-токена (маршрут исключён из проверки в `bootstrap/app.php`).  

Задача: используя `websec-lab/attacker/csrf-poc.html` (или свою HTML-страницу на другом порту), добиться смены email у залогиненной жертвы при открытии «вредоносной» страницы.  

В отчёте: схема запроса, защита в Laravel (`@csrf`, SameSite, заголовки), когда достаточно только токена.

### 4. Open redirect

Маршрут `GET /redirect?url=...` перенаправляет браузер на произвольный URL.  

Задача: показать ссылку для фишинга («войти по нашей ссылке» → ваш домен).  

В отчёте: whitelist разрешённых путей/доменов, использование `signed` URL.

### 5. IDOR

`GET /users/{id}` отдаёт JSON с email пользователя по числовому id без проверки «только свой профиль».  

Задача: войти под `alice@example.local` и получить email пользователя с **другим** id (например `GET /users/2` для bob).  

В отчёте: политика доступа, проверка `Auth::id()`, UUID вместо предсказуемого id (как мера, не панацея).

## Формат отчёта

Для каждого пункта: цель, шаги воспроизведения, скриншот или лог, уязвимый фрагмент кода (файл и строки), рекомендации по исправлению.

## Где смотреть код

- Маршруты: `websec-lab/routes/web.php`
- Контроллеры: `websec-lab/app/Http/Controllers/Lab*.php`
- Шаблоны: `websec-lab/resources/views/lab/`
- Исключение CSRF: `websec-lab/bootstrap/app.php`
