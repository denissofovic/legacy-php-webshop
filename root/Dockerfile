FROM --platform=linux/amd64 php:5.6-apache
RUN docker-php-ext-install mysqli
RUN echo "output_buffering=4096" > /usr/local/etc/php/conf.d/buffering.ini