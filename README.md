## Deploy via Docker


1. `cp .env.example .env` и прописать конфиг БД
2. `docker-compose build`
3. `docker-compose up -d`

Внутри докер контейнера:

1. `composer install`
2. `php artisan key:generate`
3. `php artisan migrate` или `php artisan migrate:fresh --seed`
4. `php artisan storage:link`
