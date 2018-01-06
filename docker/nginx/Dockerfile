FROM daocloud.io/nginx:alpine

ADD nginx.conf /etc/nginx/

RUN ifconfig

RUN apk update \
    && apk upgrade \
    && apk add --no-cache bash \
    && adduser -D -H -u 1000 -s /bin/bash www-data \
    && rm /etc/nginx/conf.d/default.conf

CMD chown -R www-data:www-data /usr/local/var/run/nginx/proxy_temp

CMD ["nginx"]

EXPOSE 80 443
