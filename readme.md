# Europa unofficial uploader of Carnage Heart EXA
Europa is Created by Laravel 5.5, Vue.js2 and bootstrap4.
And this application is open to the Heroku.

## 環境構築手順

```shell
$ cd _docker-config 
$ docker-compose up -d
$ docker-compose exec app sh
/var/www/html # composer install
/var/www/html # cp .env.example .env
/var/www/html # php artisan key:generate
```