FROM php:apache

RUN pecl install mongodb
RUN docker-php-ext-enable mongodb