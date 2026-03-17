FROM php:8.2-apache

# Enable common Apache modules
RUN a2enmod rewrite headers

# Install system deps + PHP extensions (adjust if you don't need them)
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev \
  && docker-php-ext-install pdo pdo_mysql zip \
  && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app into Apache web root
WORKDIR /var/www/html
COPY . /var/www/html

# Install PHP dependencies (only if composer.json exists / is used)
RUN composer install --no-dev --prefer-dist --no-interaction || true

# Render provides $PORT; Apache listens on 80 by default.
# We'll change Apache to listen on $PORT at container start.
COPY render-entrypoint.sh /render-entrypoint.sh
RUN chmod +x /render-entrypoint.sh

EXPOSE 80
CMD ["/render-entrypoint.sh"]
