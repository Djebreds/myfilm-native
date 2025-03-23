FROM php:8.1-apache

# Enable Apache rewrite module if needed
RUN a2enmod rewrite

# Install PHP extensions for MySQL support
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Create the upload directory (in case it doesn't exist in the repo)
RUN mkdir -p /var/www/html/Views/uploaded

# Copy your PHP application code into Apache's document root
COPY . /var/www/html/

# Adjust the permissions of the upload directory after copying
RUN chown -R www-data:www-data /var/www/html/Views/uploaded \
    && chmod -R 755 /var/www/html/Views/uploaded
