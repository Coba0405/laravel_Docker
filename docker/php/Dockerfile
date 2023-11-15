FROM php:8.2.12-fpm
COPY php.ini /usr/local/etc/php/

# RUN apt-get update \
#   && apt-get install -y zlib1g-dev mariadb-client vim libzip-dev \

# # Install Node.js and npm
# RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash -
# RUN apt-get install -y nodejs

# Install Node.js and npm
RUN apt-get update \
  && apt-get install -y nodejs 
RUN apt-get install -y npm
RUN docker-php-ext-install pdo_mysql

#Composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin


WORKDIR /var/www

RUN composer global require "laravel/installer"
