FROM nginx:1.17.8-alpine

ADD docker/nginx/vhost.conf /etc/nginx/conf.d/default.conf

RUN apk add apache2-utils

COPY public /var/www/public