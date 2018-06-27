FROM php:7.2-fpm

RUN apt-get update \
    && apt-get install -y wget \
    git \
    zip

# replace shell with bash so we can source files
# RUN rm /bin/sh && ln -s /bin/bash /bin/sh

# update the repository sources list
# and install dependencies
RUN apt-get update \
    && apt-get install -y curl \
    && apt-get -y autoclean \
    && apt-get install -y gnupg

# Install libpng because of node issues. See https://github.com/imagemin/pngquant-bin/issues/78.
RUN apt-get install --no-install-recommends gcc make libpng-dev

# install node and npm
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash && apt-get install -y nodejs

# install composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/bin/composer

COPY hoaxlybot /var/www/hoaxlybot

RUN cd /var/www/hoaxlybot && composer install --no-dev --optimize-autoloader
RUN cd /var/www/hoaxlybot && npm install && npm run production

WORKDIR "/var/www/hoaxlybot"

RUN chmod 755 "/var/www/hoaxlybot"

# run PHP server
CMD php -S 0.0.0.0:80 -t /var/www/hoaxlybot
