FROM php:8.0-apache-buster

RUN a2enmod rewrite

RUN apt-get update \
    && apt-get install -y libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick

RUN mkdir -p /var/www/html/src/uploads \
    && chown -R www-data:www-data /var/www/html/src/uploads

COPY my-apache.conf /etc/apache2/conf-available/my-apache.conf
RUN a2enconf my-apache

COPY .htaccess /var/www/html/.htaccess