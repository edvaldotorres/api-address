FROM composer:1.8 AS vendor
WORKDIR /app
COPY ./app/ /app
RUN docker-php-ext-install pcntl
RUN composer install

FROM php:7.4-fpm
WORKDIR /var/www/app/

ENV ACCEPT_EULA=Y
ENV TZ=America/Recife
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    cron \
    apt-utils \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libtool \
    libcurl4-openssl-dev \
    libzip-dev \
    libxml2-dev \
    gnupg \
    apt-transport-https \
    git \
    nginx \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN docker-php-ext-install \
    intl \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    mysqli \
    pdo \
    pdo_mysql \
    xml \
    curl \
    zip

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

COPY ./config/nginx/default.conf /etc/nginx/sites-enabled/default
COPY ./config/entrypoint.sh /etc/entrypoint.sh
COPY --from=vendor --chown=www-data:www-data /app/ /var/www/app/
# COPY ./config/crontab /etc/cron.d/crontab

# RUN crontab /etc/cron.d/crontab
# RUN chmod 0644 /etc/cron.d/crontab

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN sed -i 's/expose_php = .*/expose_php = Off/g' /usr/local/etc/php/php.ini \
    && sed -i 's/;date.timezone =/date.timezone = America\/Recife/g' /usr/local/etc/php/php.ini
# && sed -i 's/max_execution_time = 30/max_execution_time = 120/g' //usr/local/etc/php/php.ini \
# && sed -i 's/memory_limit = 128M/memory_limit = 512M/g' /usr/local/etc/php/php.ini \
# && sed -i 's/post_max_size = 8M/post_max_size = 1024M/g' /usr/local/etc/php/php.ini \
# && sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 512M/g' /usr/local/etc/php/php.ini \
# && sed -i 's/max_input_time = 60/max_input_time = 120/g' /usr/local/etc/php/php.ini \
# && sed -i 's/max_input_vars = 1000/max_input_vars = 5000/g' /usr/local/etc/php/php.ini \
# && sed -i 's/short_open_tag = Off/short_open_tag = On/g' /usr/local/etc/php/php.ini

RUN sed -i -e "s/#\sserver_tokens\soff;/server_tokens off;/" /etc/nginx/nginx.conf

EXPOSE 80

RUN chmod +x /etc/entrypoint.sh

ENTRYPOINT ["/etc/entrypoint.sh"]
