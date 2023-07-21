FROM php:8.0-apache

RUN apt-get update && apt-get install -y \
    libmagickwand-dev \
    --no-install-recommends \
    && docker-php-ext-enable imagick \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT /var/www/html

RUN a2enmod rewrite

RUN echo "extension=imagick.so" >> /usr/local/etc/php/php.ini

EXPOSE 80