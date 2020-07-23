FROM php:7.1-cli
MAINTAINER Ondrj Hlavacek <ondra@keboola.com>

ARG COMPOSER_FLAGS="--prefer-dist --no-interaction"
ARG DEBIAN_FRONTEND=noninteractive
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_PROCESS_TIMEOUT 3600

# Workdir
WORKDIR /code

COPY docker/composer-install.sh /tmp/composer-install.sh

# Deps
RUN apt-get update
RUN apt-get install -y wget curl make git patch unzip bzip2 time libzip-dev libssl1.1 openssl

# Composer
RUN chmod +x /tmp/composer-install.sh \
    && /tmp/composer-install.sh

# Main
RUN echo "memory_limit = -1" >> /usr/local/etc/php/php.ini
RUN echo "date.timezone = \"Europe/Prague\"" >> /usr/local/etc/php/php.ini

## Composer - deps always cached unless changed
# First copy only composer files
COPY composer.* /code/

# Download dependencies, but don't run scripts or init autoloaders as the app is missing
RUN composer install $COMPOSER_FLAGS --no-scripts --no-autoloader

# Copy rest of the app
COPY . /code/

# Run normal composer - all deps are cached already
RUN composer install $COMPOSER_FLAGS

# Run
ENTRYPOINT ["/code/bin/cli"]
