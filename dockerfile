FROM php:8.3-apache

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    git unzip zip libicu-dev libzip-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql intl opcache zip \
    && a2enmod rewrite

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar todos los archivos del proyecto
COPY . .

# Instalar dependencias PHP (Composer)
RUN composer install --no-interaction --optimize-autoloader

# Configuración de Apache
COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

