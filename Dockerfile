# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Ativa o módulo Rewrite do Apache (necessário para arquivos .htaccess)
RUN a2enmod rewrite

# Copia os arquivos do projeto para a pasta padrão do Apache
COPY . /var/www/html/

# Configura permissões corretas
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão
EXPOSE 80
