## Deploy via Docker


1. `cp .env.example .env` и прописать конфиг БД
2. `docker-compose build`
3. `docker-compose up -d`

Внутри докер контейнера:

4. `php artisan key:generate`
5. `php artisan migrate` или `php artisan migrate:fresh --seed`
6. `php artisan storage:link`
