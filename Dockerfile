FROM php:8.2-apache

# Instala extensões do PHP para conectar no MySQL (pdo_mysql e mysqli)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Habilita mod_rewrite do Apache
RUN a2enmod rewrite

# Copia todos os arquivos do projeto para o diretório do Apache
COPY . /var/www/html/

# Expõe a porta 80 do contêiner
EXPOSE 80