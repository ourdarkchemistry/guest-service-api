# Guest Service API

## Описание

Микросервис для управления данными гостей с использованием PHP, Slim Framework и MySQL.

## Запуск

1. Клонируйте репозиторий.
2. Скачайте зависимости с помощью Composer:
   ```bash
   composer install
# Guest Service API

## Описание

Микросервис для управления данными гостей с использованием PHP, Slim Framework и MySQL.

## Запуск

1. Клонируйте репозиторий.
2. Скачайте зависимости с помощью Composer:
   ```bash
   composer install
3. Запустите приложение в Docker:
   ```bash
   docker-compose up -d

## API
GET /guests — получить всех гостей.
POST /guests — создать нового гостя.
GET /guests/{id} — получить гостя по ID.
PUT /guests/{id} — обновить данные гостя.
DELETE /guests/{id} — удалить гостя.

## Заголовки
X-Debug-Time — время выполнения запроса.
X-Debug-Memory — память, использованная запросом.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact
- **Email:** ourdarkchemistry@gmail.com
- **GitHub:** https://github.com/ourdarkchemistry
