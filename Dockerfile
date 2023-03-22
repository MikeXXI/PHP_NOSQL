FROM composer:latest AS composer

FROM php:apache

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

ADD page/ .

RUN apt update && apt install zip unzip git -y && apt upgrade -y

RUN pecl install mongodb && docker-php-ext-enable mongodb
 
RUN composer require mongodb/mongodb && composer dump-autoload