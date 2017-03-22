FROM php:7.1.3-apache

COPY . /var/www/html/
RUN a2enmod rewrite && service apache2 restart