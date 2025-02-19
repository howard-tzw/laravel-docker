# Laravel-Docker plug-and-play

This is a quick plug-and-play setup for your `Laravel-Docker` projects

Comes with:
- web-app: `Laravel/PHP-7.2`
- web-server: `Nginx:alpine`
- database: `Mysql-5.7.22`

## Setup
- `git clone git@github.com:shsma/laravel-docker.git`
- `cd laravel-docker-master`
- `docker-compose up -d`
- `docker exec app composer install`
- `cp .env.example .env`
- `docker-compose exec app php artisan key:generate`

Now that all containers are up, we can add `127.0.0.1 laravel.test` to our `/etc/hosts` file

Boom! access `laravel.test` on your favorite browser

## Questions and Improvements

For any question or emprovement please send an e-mail to Shady Smaoui [shady@veloxsolutions.ca](mailto:shady@veloxsolutions.ca).

## License

ShadySmaoui©2020 licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Issues
- laravel-lang not works
