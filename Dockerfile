# Menggunakan base image PHP 7.4 dengan Apache
FROM php:7.4-apache

# Update package repository dan install dependensi yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Konfigurasi dan install ekstensi PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Tentukan direktori kerja Apache
WORKDIR /var/www/html

# Salin source code aplikasi ke direktori web Apache
COPY . /var/www/html/

# Buat symlink sigkdg mengarah ke root web agar URL berbasis /sigkdg tetap berfungsi normal
RUN ln -s /var/www/html /var/www/html/sigkdg

# Atur kepemilikan dan permission direktori web
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/img

# Expose port Apache
EXPOSE 80

# Jalankan Apache di foreground
CMD ["apache2-foreground"]

