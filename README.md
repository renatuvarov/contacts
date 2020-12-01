## Порядок установки

### Фреймворк Laravel

1. в корне проекта в консоли выполнить команду `docker-compose up -d`
2. выполнить установку фреймворка: `docker exec -it laravel-php composer install`
3. выполнить миграцию и создать тестовые данные в БД: `docker exec -it laravel-php php artisan migrate:fresh --seed` (дамп базы данных `contacts.sql` использовать не нужно, на этом этапе будут созданы все необходимые данные)

После установки проект доступен по адресу http://localhost

Дамп можно импортировать с помощью команды `docker exec -i laravel-mysql mysql -u root --password=root laravel < contacts.sql` (тогда 3 пункт выполнять не нужно)
