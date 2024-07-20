# Gunakan image PHP dari Docker Hub
FROM php:7.4-apache

# Salin file PHP aplikasi Anda ke dalam container
COPY . /var/www/html

# Expose port 80 untuk Apache web server
EXPOSE 80
