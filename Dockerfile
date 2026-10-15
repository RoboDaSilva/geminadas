# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Ativa o módulo Rewrite do Apache
RUN a2enmod rewrite

# Copia os ficheiros para a pasta padrão do Apache
COPY . /var/www/html/

# Altera o DocumentRoot para a pasta public do projeto
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Adiciona permissão de acesso ao diretório public no Apache (corrige o erro 403 Forbidden)
RUN echo '<Directory /var/www/html/public/>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Configura as permissões de dono dos ficheiros para o utilizador do Apache
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão
EXPOSE 80
