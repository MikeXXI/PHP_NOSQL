FROM php:apache

RUN pecl install mongodb
RUN docker-php-ext-enable mongodb
RUN touch /usr/local/etc/php/conf.d/mongodb.ini
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini