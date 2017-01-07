FROM php:5.5-apache

MAINTAINER Fernando Moreira <nandomoreira.me@gmail.com>

ENV APPPATH = /var/www/html

RUN apt-get update
RUN apt-get install -y \
      curl \
      wget \
      vim \
      sendmail-bin \
      mysql-client \
      libmysqlclient-dev && \
    apt-get clean

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli

ADD src/docker.conf /etc/apache2/sites-enabled/

USER root
WORKDIR /var/www/

RUN rm -rf ./html/
RUN wget --quiet https://wordpress.org/latest.tar.gz
RUN tar -xzf latest.tar.gz
RUN mv -f wordpress html

WORKDIR /var/www/html

ADD src/.htaccess ./
ADD src/wp-config.* ./

RUN chown -R www-data: /var/www/html

EXPOSE 80
