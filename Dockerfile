FROM php:8.1-fpm
WORKDIR /var/www
COPY . .
RUN apt-get update && docker-php-ext-install pdo pdo_mysql
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
