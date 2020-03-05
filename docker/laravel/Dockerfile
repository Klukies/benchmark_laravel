FROM php:7.4-fpm

COPY composer.lock composer.json /var/www/

COPY database /var/www/database

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
	git \
	curl \
	libz-dev \
	libpq-dev \
	libicu-dev \
	libxslt-dev \
	libmcrypt-dev \
	libpng-dev \
	libxml2-dev \
	libonig-dev \
	libmagickwand-dev --no-install-recommends \
	zip \
	unzip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && php composer.phar install --no-dev --no-scripts \
    && rm composer.phar

COPY . /var/www

RUN chown -R www-data:www-data \
    /var/www/storage \
    /var/www/bootstrap/cache

RUN  pecl install mcrypt-1.0.3 \
    && docker-php-ext-install opcache mbstring pdo pdo_pgsql \
    && docker-php-ext-enable mcrypt

ENTRYPOINT php artisan key:generate \
    && php artisan config:cache \
    && php artisan migrate:fresh

CMD docker-php-entrypoint php-fpm
