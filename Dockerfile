FROM trafex/php-nginx:3.4.0

WORKDIR /var/www/html

USER nobody

COPY --chown=nobody ./ /var/www/html

EXPOSE 8080

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

HEALTHCHECK --timeout=10s CMD curl --silent --fail http://127.0.0.1:8080/fpm-ping
