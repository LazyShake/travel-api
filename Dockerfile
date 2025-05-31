# Используем PHP с FPM
FROM php:8.2-fpm

# Устанавливаем системные пакеты и PHP-расширения
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Установка Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Установка рабочей директории
WORKDIR /var/www

# Копируем всё (включая .env)
COPY . .

# Установка зависимостей Laravel
RUN composer install --no-interaction --optimize-autoloader

# Генерация ключа приложения
RUN php artisan key:generate

# Даем права на storage и bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# (опционально) Кэшируем конфиги и маршруты
# RUN php artisan config:cache && php artisan route:cache

# Открываем порт (если нужно для fpm, не всегда нужен)
EXPOSE 9000

# Запускаем php-fpm
CMD ["php-fpm"]
