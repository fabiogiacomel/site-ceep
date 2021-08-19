FROM ambientum/php:7.1-nginx

WORKDIR /var/www/app
COPY . /var/www/app

RUN sudo chmod 777 -R /var/www/app/ && composer install

EXPOSE 8080