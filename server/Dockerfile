FROM php:8.2-apache


ARG APP_ENV
ENV APP_ENV=${APP_ENV}

ARG DB_CONNECTION
ENV DB_CONNECTION=${DB_CONNECTION}

ARG DB_HOST
ENV DB_HOST=${DB_HOST}

ARG DB_PORT
ENV DB_PORT=${DB_PORT}

ARG DB_DATABASE
ENV DB_DATABASE=${DB_DATABASE}

ARG DB_USERNAME
ENV DB_USERNAME=${DB_USERNAME}

ARG DB_PASSWORD
ENV DB_PASSWORD=${DB_PASSWORD}


WORKDIR /var/www/

RUN apt-get update && apt-get install -y \
    libzip-dev \
    && docker-php-ext-install zip pdo_mysql
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
EXPOSE 8080
COPY . /var/www/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN composer install
RUN chmod 777 -R /var/www/storage/ && \
    echo "Listen 8080" >> /etc/apache2/ports.conf  && \
    a2enmod rewrite