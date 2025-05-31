# 🌍 Travel API

**Travel API** — это REST API-сервис на Laravel, предназначенный для выбора мест отдыха. Проект использует PostgreSQL, Docker и Laravel Artisan для управления миграциями и сидерами. Он был полностью контейнеризирован и успешно протестирован.

## 📦 Состав проекта

- **Laravel 10+**
- **PostgreSQL**
- **Docker & Docker Compose**
- **PHP 8.2 (FPM)**
- **Composer**
- **Artisan миграции и сидеры**

## 🚀 Быстрый старт

### 1. Клонируй репозиторий
```bash
git clone https://github.com/yourusername/travel-api.git
cd travel-api
```

### 2. Настрой `.env`
Убедись, что файл `.env` присутствует в корне проекта. В нем должны быть указаны данные для подключения к базе данных:

```env
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=travel
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

### 3. Запусти проект в Docker
```bash
docker-compose up -d --build
```

После сборки будет запущено два контейнера:
- `travel-api` — PHP-FPM Laravel приложение
- `travel-db` — PostgreSQL база данных

### 4. Выполни миграции и сидеры
```bash
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

### 5. Доступ к API
Приложение будет доступно по адресу:

```
http://localhost:9000
```

## 🐳 Структура Docker

- **Dockerfile** — содержит инструкции по сборке Laravel-приложения
- **docker-compose.yml** — определяет контейнеры и их взаимодействие
- `.dockerignore` — исключает лишние файлы из сборки

## 🛠 Полезные команды

### Artisan
```bash
docker-compose exec app php artisan <command>
```

Примеры:
- `php artisan migrate` — выполнить миграции
- `php artisan db:seed` — запустить сидеры
- `php artisan route:list` — показать маршруты

### Composer
```bash
docker-compose exec app composer install
```

## 🧪 Статус

✅ Миграции и сидеры протестированы  
✅ Контейнеры запускаются и работают стабильно  
✅ Используются Laravel best practices  
✅ Подключение к PostgreSQL через Docker-сеть

## 📁 TODO

- [ ] Добавить документацию API (например, Swagger)
- [ ] Настроить CI/CD
- [ ] Написать тесты

## 🧑‍💻 Автор

Александр