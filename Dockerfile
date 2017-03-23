FROM php:7.1.3-apache

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

COPY . /var/www/html/

RUN cd /var/www/html/ \
    && composer update

RUN a2enmod rewrite && service apache2 restart