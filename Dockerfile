# базовый образ php
FROM php:8.1-fpm

# установка зависимостей
RUN apt-get update && apt-get install -y \
    git \
    libicu-dev \
    libpq-dev \
    && docker-php-ext-install intl pdo pdo_mysql

# установка composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# рабочая директория
WORKDIR /var/www
COPY . /var/www

# установка зависимостей
RUN composer install --no-dev --optimize-autoloader

# запуск php-fpm
CMD ["php-fpm"]
