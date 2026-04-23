FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    postgresql-client \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql gd bcmath \
    && a2enmod rewrite \
    && a2enmod headers

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /app/public|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i '/<Directory \/var\/www\/html>/,/<\/Directory>/c\<Directory /app/public>\n        Options Indexes FollowSymLinks\n        AllowOverride All\n        Require all granted\n    <\/Directory>' /etc/apache2/sites-available/000-default.conf

COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

WORKDIR /app

COPY . .

RUN composer install --no-interaction --prefer-dist

RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

RUN mkdir -p /app/storage/logs /app/storage/framework/cache /app/storage/framework/sessions /app/storage/framework/views

EXPOSE 80

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
