FROM php:7.3.6-fpm-alpine3.9

RUN apk add --no-cache php7-pear php7-dev gcc musl-dev make shadow openssl bash mysql-client nodejs npm git
RUN docker-php-ext-install pdo pdo_mysql

RUN touch /home/www-data/.bashrc | echo "PS1='\w\$ '" >> /home/www-data/.bashrc

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 www-data

WORKDIR /var/www

RUN rm -rf /var/www/html && ln -s public html

RUN chown -R www-data:www-data /var/www

USER www-data

EXPOSE 9000
