FROM registry.2le.net/2le/2le:base-php7-apache
RUN apt-get update;apt-get install -y unoconv
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd
COPY ./docker/php/php.ini /usr/local/etc/php/
COPY ./docker/apache/default.conf /etc/apache2/sites-available/000-default.conf
COPY . /var/www/html/
RUN mkdir -p /var/www/.cache && chown www-data /var/www/.cache && chgrp www-data /var/www/.cache
RUN mkdir -p /var/www/.config && chown www-data /var/www/.config && chgrp www-data /var/www/.config
WORKDIR /var/www/html
RUN composer install
RUN npm install
RUN bin/console assets:install
RUN ./node_modules/.bin/encore dev
RUN rm -rf /var/www/html/var/cache/*; chmod -R 777 /var/www/html/var
EXPOSE 80
CMD ["sh", "-c","make migrate;apache2-foreground"]
