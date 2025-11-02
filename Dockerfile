FROM php:8.3-cli

# System deps
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libzip-dev zip libonig-dev pkg-config \
 && docker-php-ext-install pdo_mysql intl mbstring exif pcntl bcmath \
 && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www/html

# Entrypoint
COPY docker/app/entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 8000
ENTRYPOINT ["sh", "/usr/local/bin/docker-entrypoint.sh"]