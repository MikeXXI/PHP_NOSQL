FROM php:apache

RUN apt update && apt install -y libcurl4-openssl-dev pkg-config libssl-dev
RUN pecl install mongodb/mongodb
RUN docker-php-ext-enable mongodb/mongodb
