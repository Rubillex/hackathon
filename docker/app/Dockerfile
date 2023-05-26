FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    npm \
    sudo  \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libwebp-dev

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions http

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath zip opcache

# Install composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Add user for laravel application
RUN sudo groupadd -g 1000 www
RUN sudo useradd -u 1000 -ms /bin/bash -g www www


RUN sudo chown -R www /bin/bash && \
    sudo chown -R www /var/www -R


COPY --chown=www:www . /var/www

# Change current user to www
USER www

RUN composer install
RUN php artisan key:generate

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
