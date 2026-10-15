# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Ativa o módulo Rewrite do Apache
RUN a2enmod rewrite

# Instala e ativa a extensão mysqli para o PHP
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copia todos os ficheiros da raiz do repositório para a pasta padrão do Apache
COPY . /var/www/html/

# Remove completamente o .htaccess para garantir que nenhuma regra antiga de redirecionamento interfira
RUN rm -f /var/www/html/.htaccess

# Força o Apache a injetar variáveis de ambiente de HTTPS para que o PHP detete sempre o SSL corretamente através do proxy
RUN echo "SetEnvIf X-Forwarded-Proto https HTTPS=on" >> /etc/apache2/apache2.conf

# Garante permissões corretas de acesso e leitura para o Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expõe a porta padrão
EXPOSE 80
