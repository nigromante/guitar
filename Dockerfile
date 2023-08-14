FROM php:8-apache

RUN apt-get update && apt-get upgrade -y
RUN apt-get install sudo unzip wget curl git -y
RUN docker-php-ext-install mysqli
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN pecl install redis  && docker-php-ext-enable redis

COPY ./conf/xdebug/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d

RUN curl -Lsf 'https://storage.googleapis.com/golang/go1.8.3.linux-amd64.tar.gz' | tar -C '/usr/local' -xvzf -
ENV PATH /usr/local/go/bin:$PATH
RUN go get github.com/mailhog/mhsendmail
RUN cp /root/go/bin/mhsendmail /usr/bin/mhsendmail
RUN echo 'sendmail_path = /usr/bin/mhsendmail --smtp-addr mailhog:1025' >> /usr/local/etc/php/php.ini

RUN echo 'session.save_handler = redis' >> /usr/local/etc/php/php.ini
RUN echo 'session.save_path = tcp://redis:6379' >> /usr/local/etc/php/php.ini

RUN a2enmod rewrite
RUN a2enmod ssl
RUN service apache2 restart

EXPOSE 80
