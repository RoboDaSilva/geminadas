# Usa a imagem oficial do PHP com Apache embutido
FROM php:8.2-apache

# Copia os arquivos do projeto para a pasta padrão do Apache
COPY . /var/www/html/

# Configura permissões (opcional, mas recomendado)
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão do Apache
EXPOSE 80
