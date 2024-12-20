# Usar una imagen de PHP oficial
FROM php:8.2-fpm

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git unzip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar el directorio de trabajo
WORKDIR /var/www

# Copiar los archivos de la aplicación al contenedor
COPY . .

# Instalar dependencias con Composer
RUN composer install --no-dev --optimize-autoloader

# Configurar la clave de la aplicación
RUN php artisan key:generate

# Configurar el servidor Laravel
CMD php artisan serve --host 0.0.0.0 --port 10000
