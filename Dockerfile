# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Ativa o módulo Rewrite do Apache
RUN a2enmod rewrite

# Instala e ativa a extensão mysqli para o PHP
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copia todos os ficheiros da raiz do repositório para a pasta padrão do Apache
COPY . /var/www/html/

# Remove linhas de redirecionamento HTTPS/Domínio indesejadas do .htaccess para evitar loops
RUN if [ -f /var/www/html/.htaccess ]; then \
    sed -i '/%{HTTPS}/d' /var/www/html/.htaccess; \
    sed -i '/RewriteRule \^(.*)\$ https:\/\//d' /var/www/html/.htaccess; \
    fi

# Garante permissões corretas de acesso e leitura para o Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expõe a porta padrão
EXPOSE 80
