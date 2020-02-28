# Laravel Benchmark

## Requirements
* Docker for desktop
* Composer and PHP to install dependencies

## Installation
* Clone the repository
* install the dependencies by running ```composer install --ignore-platform-reqs```
* Copy .env.example to .env
* Generate an application key with ```php artisan key:generate```
* Run ```docker-compose up -d```
* Run ```docker exec -it laravel_app sh```
* Run ```php artisan migrate:fresh --seed```