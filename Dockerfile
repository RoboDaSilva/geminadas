# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Ativa o módulo Rewrite do Apache
RUN a2enmod rewrite

# Copia todos os ficheiros da raiz do repositório para a pasta padrão do Apache
COPY . /var/www/html/

# Renomeia o .htaccess temporariamente para testar se ele é a causa do loop de redirecionamento
RUN if [ -f /var/www/html/.htaccess ]; then mv /var/www/html/.htaccess /var/www/html/.htaccess_bak; fi

# Garante permissões corretas de acesso e leitura para o Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expõe a porta padrão
EXPOSE 80
