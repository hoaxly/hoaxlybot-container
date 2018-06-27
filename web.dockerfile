FROM nginx

ADD conf/nginx/vhost.conf /etc/nginx/conf.d/default.conf

COPY hoaxlybot/public /var/www/public
