# Use PHP base image
FROM php:8.1-fpm

# Install necessary extensions and dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www

# Copy application files into the container
COPY . /var/www

# Install Composer dependencies
RUN composer install --optimize-autoloader --no-dev

# Expose port
EXPOSE 10000

# Start Laravel app
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
