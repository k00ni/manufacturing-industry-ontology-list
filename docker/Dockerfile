FROM php:8.3-cli

RUN useradd -r --home /home/ontolist -u 1000 ontolist
RUN usermod -a -G www-data ontolist
RUN mkdir /home/ontolist
RUN chown ontolist:www-data /home/ontolist
RUN adduser ontolist sudo

RUN mkdir /app
WORKDIR /app

CMD ["tail -f /dev/null"]
