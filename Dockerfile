# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Ativa o módulo Rewrite do Apache (essencial para rotas e .htaccess)
RUN a2enmod rewrite

# Copia todos os ficheiros do projeto para a pasta do Apache
COPY . /var/www/html/

# Altera a raiz do Apache (DocumentRoot) para apontar para a pasta "public"
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Configura as permissões corretas
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão
EXPOSE 80
