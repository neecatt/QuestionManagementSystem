FROM php:8-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Enable PHP extensions
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd



# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the application code
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate an application key
RUN php artisan key:generate

# Set permissions for the storage and bootstrap/cache directories
RUN chmod -R 775 storage bootstrap/cache

RUN service apache2 restart


# Expose port 80
EXPOSE 80

# Set the entrypoint to the Apache daemon
# ENTRYPOINT ["apache2-foreground"]
