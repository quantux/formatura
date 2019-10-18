#FROM php:7.2.6-apache
#RUN docker-php-ext-install mysqli
#RUN docker-php-ext-install mbstring
#RUN docker-php-ext-install zip 
#RUN docker-php-ext-install gd



FROM php:7.3-apache-stretch

RUN a2enmod rewrite

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN yes | pecl install xdebug-2.7.0 \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN usermod -u 431 www-data

RUN set -eux; apt-get update; apt-get install -y libzip-dev zlib1g-dev libpng-dev; docker-php-ext-install zip

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip 
RUN docker-php-ext-install gd
