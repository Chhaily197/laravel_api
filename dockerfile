# Use the official PHP image

FROM php:8.2-frm

ARG user
ARG uid

# Use the official MySQL image from Docker Hub
FROM mysql:latest

#Set enviroment variable (options)
ENV MYSQL_DATABASE=mydatabase \
    MySQL_USER=root \   
    MySQL_PASSWORD= \
    MySQL_ROOT_PASSWORD=rootpassword

# Copy custom Mysql configuration file
COPY ./custom.cnf /etc/mysql/conf.d/custom.cnf

# Expose poet 3306 (default Mysql port)
EXPOSE 3306

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

USER $user

