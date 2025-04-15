FROM dunglas/frankenphp:php8.3-bookworm

ENV SERVER_NAME=":8080"

# Install system dependencies and PostgreSQL driver
RUN apt-get update && apt-get install -y \
    ca-certificates \
    curl \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && update-ca-certificates

# Install Composer manually with TLS disabled
RUN curl -k -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php && \
    chmod +x /usr/local/bin/composer

# Confirm Composer installed (for debugging)
RUN composer --version

WORKDIR /app

COPY . .

# Disable TLS and install PHP dependencies
RUN composer config --global disable-tls true && \
    composer install \
        --ignore-platform-reqs \
        --optimize-autoloader \
        --prefer-dist \
        --no-interaction \
        --no-progress \
        --no-scripts
