FROM php:8.3-cli

# install and setup required system library
RUN apt-get update && \
    apt-get install -y git libicu-dev libzip-dev make nano net-tools raptor2-utils wget zip zlib1g-dev
RUN docker-php-ext-install intl zip && docker-php-ext-enable intl zip

# install Composer globally (required to install PHP vendors)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# add a non-root user to limit user rights
RUN useradd -r --home /home/ontolist -u 1000 ontolist
RUN usermod -a -G www-data ontolist
RUN mkdir /home/ontolist
RUN chown ontolist:www-data /home/ontolist
RUN adduser ontolist sudo

# add custom PHP.ini settings
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./custom.ini /usr/local/etc/php/conf.d/custom.ini

# create and mark working dir
RUN mkdir /app
WORKDIR /app

# run this after container started to keep it alive
CMD ["tail -f /dev/null"]
