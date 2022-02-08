# Laravel 8 blog

Simple blog built on Laravel 8. 
With an admin account, you can create posts and edit them.
There's an email system also, but you need a mailchimp account
and keys.

Project following this course from Laracasts:
[link](https://laracasts.com/series/laravel-8-from-scratch)

### Installation

- Copy the .env.example to .env `cp .env.example .env`
- Execute `docker-compose build && docker-compose up -d`
- Once built, get into the laravel_blog_php service:
- `docker exec -it laravel_blog_php /bin/sh` and execute:
- `composer install`
- `php artisan key:generate`
- `php artisan migrate --seed`
- Finally go to `http://laravel-blog.fuf.me/`
- If it continues asking you for the key, do the following:
- `docker-compose down` and then `docker-compose up -d`
