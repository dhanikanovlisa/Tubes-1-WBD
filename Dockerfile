FROM php:8.0-apache
WORKDIR /var/www/html
COPY src/public/index.php .
EXPOSE 80