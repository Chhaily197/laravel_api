# Use the official PHP image

FROM php:8.2-frm

ARG user
ARG uid

#Set working directory
WORKDIR /var/www

#Install dependencies
RUN apt update && apt install -y \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
RUN apt clear && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath dg

# Enable apache modules
RUN a2enmod rewrite

# Copy laravel files
COPY  --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data, root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

#Install Laravel dependencies
RUN composer install

#Expose port 80
EXPOSE 80

USER $user

