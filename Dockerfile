FROM php:7.3.6-apache-stretch

RUN apt-get update
RUN apt-get install -y apt-utils vim curl sqlite3
RUN yes | pecl install xdebug && docker-php-ext-enable xdebug

# copy test db file
ADD ./db/employee.db /employee.db

# The base image does not have php.ini. 
# Copy our own, with xdebug settings
ADD ./php.ini /usr/local/etc/php/

EXPOSE 80
