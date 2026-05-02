FROM php:8.1-fpm

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        curl \
        unzip \
        zip \
        libzip-dev \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        ca-certificates \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        zip \
        exif \
        pcntl \
        bcmath \
        gd \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && npm install -g npm@latest \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

COPY package.json package-lock.json ./
RUN npm ci

RUN if [ ! -f .env ]; then cp .env.example .env; fi \
    && php artisan key:generate --ansi || true

EXPOSE 8000 5173

CMD sh -c "php artisan serve --host=0.0.0.0 --port=8000 & npm run dev -- --host=0.0.0.0"
