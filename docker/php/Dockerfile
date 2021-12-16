FROM php:8.1.0-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
    && apt-get install -y zlib1g-dev libzip-dev git libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-install zip gd bcmath

# composer install
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www/server

RUN composer self-update
RUN composer global require "laravel/installer"

# install xdebug
ARG INSTALL_XDEBUG=false
ARG HOST_IP

RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=${HOST_IP}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    # && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.log=/tmp/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    ;fi

# 日本語設定
ENV LANG=C.UTF-8
ENV LANGUAGE=en_US: