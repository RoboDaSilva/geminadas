# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Ativa o módulo Rewrite do Apache
RUN a2enmod rewrite

# Copia todos os ficheiros da raiz do repositório para a pasta padrão do Apache
COPY . /var/www/html/

# Ativa o log detalhado de redirecionamentos do PHP e exibe todos os erros
RUN echo "display_errors = On" >> /usr/local/etc/php/php.ini \
    && echo "display_startup_errors = On" >> /usr/local/etc/php/php.ini \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/php.ini \
    && echo "auto_prepend_file = /var/www/html/debug_redirect.php" >> /usr/local/etc/php/php.ini

# Cria um script temporário para capturar a origem do redirecionamento nos logs do Apache
RUN echo '<?php \n\
// Intercepta cabeçalhos de redirecionamento para depuração \n\
header_register_callback(function() {\n\
    foreach (headers_list() as $header) {\n\
        if (stripos($header, "Location:") === 0) {\n\
            error_log("REDIRECT DETECTED -> " . $header);\n\
            error_log(print_r(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS), true));\n\
        }\n\
    }\n\
});\n\
?>' > /var/www/html/debug_redirect.php

# Garante permissões corretas de acesso e leitura para o Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expõe a porta padrão
EXPOSE 80
