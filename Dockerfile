FROM php:8.2-apache

# Ativa o mod_rewrite do Apache
RUN a2enmod rewrite

# Instala e ativa a extensão mysqli para o PHP
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copia os ficheiros para a raiz do servidor web do Apache
COPY . /var/www/html/

# Liberta o uso de .htaccess e define as permissões da diretoria padrão
RUN sed -i '/<Directory \/var\/www\/html>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Garante que o Apache lê ficheiros index.php como prioridade máxima
RUN echo "DirectoryIndex index.php index.html" >> /etc/apache2/apache2.conf

# Ativa a exibição de erros do PHP para diagnosticarmos caso continue em branco
RUN echo "php_flag display_errors On" >> /etc/apache2/apache2.conf \
    && echo "php_value error_reporting E_ALL" >> /etc/apache2/apache2.conf

# Ajusta as permissões de todos os ficheiros para o utilizador do Apache
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80
