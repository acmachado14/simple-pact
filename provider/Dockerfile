FROM php:8.0-fpm

RUN apt-get update -y && \
    apt-get install -y git g++ python3 build-essential && \
    rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /usr/local/service

WORKDIR /usr/local/service

RUN composer install