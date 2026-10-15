FROM php:8.2-apache

RUN a2enmod rewrite

# Instala a extensão mysqli para o PHP
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY . /var/www/html/

# Liberta o uso de .htaccess no Apache
RUN sed -i '/<Directory \/var\/www\/html>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
