FROM php:8.2-apache

RUN a2enmod rewrite

# Instala a extensão mysqli para o PHP
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Liberta o uso de .htaccess no Apache
RUN sed -i '/<Directory \/var\/www\/html>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Ativa a exibição de erros do PHP na tela para depuração
RUN echo "php_flag display_errors On" >> /etc/apache2/apache2.conf \
    && echo "php_value error_reporting E_ALL" >> /etc/apache2/apache2.conf

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
