FROM php:8.1-cli

# Set working directory
WORKDIR /var/www/html

# Copy the contents of the 'public' directory to the container
COPY . /var/www/html/

# Expose port 8080
EXPOSE 8080

# Start the built-in PHP server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public/"]
#php -S localhost:8080 -t public/
