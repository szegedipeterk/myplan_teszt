FROM php:8.0-apache-buster

# Engedélyezi a mod_rewrite modult
RUN a2enmod rewrite

# Engedélyezi az imagick PHP bővítményt
RUN apt-get update \
    && apt-get install -y libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick

RUN mkdir -p /var/www/html/src/uploads \
    && chown -R www-data:www-data /var/www/html/src/uploads

# Másold be az Apache virtuális host konfigurációt
COPY my-apache.conf /etc/apache2/conf-available/my-apache.conf
RUN a2enconf my-apache

# Másold be a .htaccess fájlt
COPY .htaccess /var/www/html/.htaccess