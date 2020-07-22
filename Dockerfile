FROM php:7.1-fpm
MAINTAINER Ondrj Hlavacek <ondra@keboola.com>

# Deps
RUN apt-get update
RUN apt-get install -y wget curl make git patch unzip bzip2 time libzip-dev libssl1.1 openssl

# Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN cp ./composer.phar /usr/local/bin

# Main
RUN echo "memory_limit = -1" >> /usr/local/etc/php/php.ini
RUN echo "date.timezone = \"Europe/Prague\"" >> /usr/local/etc/php/php.ini

# Workdir
COPY . /code
WORKDIR /code

# Install
RUN composer.phar selfupdate && composer.phar install --no-interaction

# Run
ENTRYPOINT ["/code/bin/cli"]
