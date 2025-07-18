# syntax=docker/dockerfile:1

# Étape 1 : Installer les dépendances avec composer et phpunit (stage de build)
FROM composer:lts AS deps

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction

COPY . /app
# PHPUnit est disponible dans vendor/bin/phpunit

# Étape 2 : Image finale pour la production avec Apache et PHP
FROM php:8.2-apache AS final

RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Copier uniquement les dépendances (vendor) de l'étape deps
COPY --from=deps /app/vendor /var/www/html/vendor

# Copier les dossiers nécessaires, en gardant /public comme racine web
COPY ./public /var/www/html/public
COPY ./src /var/www/html/src
COPY ./config /var/www/html/config

COPY ./apache.conf /etc/apache2/conf-available/myapp.conf
RUN a2enconf myapp

# Modifier DocumentRoot pour pointer vers /var/www/html/public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

USER www-data

