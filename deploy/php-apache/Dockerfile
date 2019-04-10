FROM php:7-apache

ARG GIT_REPO
ARG GIT_USER
ARG GIT_PASSWORD
ARG GIT_BRANCH

ENV DATABASE_NAME 'mysql'
ENV DATABASE_USER 'root'
ENV DATABASE_PASSWORD ''
ENV DATABASE_HOST 'mysql'


RUN a2enmod rewrite


RUN apt-get update && \
apt-get install -y git wget libzip-dev zlib1g-dev mysql-client  libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
docker-php-ext-install zip && docker-php-ext-install pdo_mysql && docker-php-ext-install mysqli && \
docker-php-ext-install -j$(nproc) iconv && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd && \
mkdir /tools && \
wget https://getcomposer.org/installer -O /tools/composer-setup.php && \
php /tools/composer-setup.php --install-dir=/tools --filename=composer && \
apt-get autoremove --purge && rm -rf /var/lib/apt/lists/*

COPY timezone.ini /usr/local/etc/php/conf.d/
COPY entrypoint.sh /tools/entrypoint.sh
COPY apache_default.conf /etc/apache2/sites-available/000-default.conf
RUN chmod a+x /tools/entrypoint.sh

ENTRYPOINT ["/tools/entrypoint.sh"]
EXPOSE 80
CMD ["apache2-foreground"]
