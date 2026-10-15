# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Ativa o módulo Rewrite do Apache
RUN a2enmod rewrite

# Instala e ativa a extensão mysqli para o PHP se ligar à base de dados
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copia todos os ficheiros da raiz do repositório para a pasta padrão do Apache
COPY . /var/www/html/

# Restaura o .htaccess se ele tiver sido renomeado antes
RUN if [ -f /var/www/html/.htaccess_bak ]; then mv /var/www/html/.htaccess_bak /var/www/html/.htaccess; fi

# Garante permissões corretas de acesso e leitura para o Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expõe a porta padrão
EXPOSE 80
