FROM php:7.4-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get update \
    && apt-get install -y --no-install-recommends locales apt-utils nodejs git libicu-dev g++ libfreetype6-dev libpng-dev libjpeg62-turbo-dev libxml2-dev libzip-dev libonig-dev libxslt-dev

RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

RUN a2enmod rewrite
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring zip gd xsl
RUN pecl install apcu && docker-php-ext-enable apcu
COPY . /var/www/
COPY ./php/vhosts/default.conf /etc/apache2/sites-enabled/000-default.conf
COPY ./php/php.ini /usr/local/etc/php/

RUN mkdir -p /var/www/.cache && chown www-data /var/www/.cache && chgrp www-data /var/www/.cache
RUN mkdir -p /var/www/.config && chown www-data /var/www/.config && chgrp www-data /var/www/.config
WORKDIR /var/www/project
RUN composer install
RUN npm install
RUN bin/console assets:install
RUN ./node_modules/.bin/encore dev
