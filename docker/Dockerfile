FROM php:8.3-cli

RUN apt-get update && \
    apt-get install -y git libicu-dev libzip-dev make nano net-tools raptor2-utils wget zip zlib1g-dev

RUN docker-php-ext-install intl zip && docker-php-ext-enable intl zip

# install composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN useradd -r --home /home/ontolist -u 1000 ontolist
RUN usermod -a -G www-data ontolist
RUN mkdir /home/ontolist
RUN chown ontolist:www-data /home/ontolist
RUN adduser ontolist sudo

# add custom PHP.ini settings
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./custom.ini /usr/local/etc/php/conf.d/custom.ini

RUN mkdir /app
WORKDIR /app

CMD ["tail -f /dev/null"]
