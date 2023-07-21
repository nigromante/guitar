FROM php:8-apache

RUN apt-get update && apt-get upgrade -y
RUN apt-get install sudo unzip wget curl -y
RUN docker-php-ext-install mysqli
RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY ./conf/php/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d


RUN a2enmod rewrite
RUN a2enmod ssl
RUN service apache2 restart
 
EXPOSE 80
