FROM php:8.3-fpm-alpine

# Установка системных пакетов
RUN apk add --no-cache \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    icu-dev \
    libxml2-dev \
    oniguruma-dev \
    curl-dev \
    libzip-dev \
    bash

# Установка PHP-расширений
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        intl \
        soap \
        xml \
        curl \
        zip

# Установка расширения Redis через PECL
RUN apk add --no-cache autoconf gcc g++ make \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del autoconf gcc g++ make

# Установка Composer глобально
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

EXPOSE 9000

WORKDIR /var/www/html

CMD ["php-fpm"]
