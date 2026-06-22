FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql

RUN a2enmod rewrite

ENV DB_HOST=host.docker.internal
ENV DB_USER=root
ENV DB_PASSWORD=rootpassword
ENV DB_NAME=my_database
ENV APP_ENV=development

WORKDIR /var/www/html

COPY . /var/www/html/

EXPOSE 80