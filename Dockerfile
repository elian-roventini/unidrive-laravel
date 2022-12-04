FROM node:16 as node

WORKDIR /app

COPY . /app
RUN npm install
RUN npm run build

FROM php:8.1-apache

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite negotiation \
    && docker-php-ext-install opcache

WORKDIR /app
COPY --chown=www-data:www-data . /app
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN composer install
RUN cp .env.example .env

COPY --from=node /app /app

CMD php artisan serve --host=0.0.0.0 --port=80

EXPOSE 80
