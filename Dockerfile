FROM php:5.5
COPY ./app.php /root/index.php
COPY ./vendor /root/vendor
EXPOSE 80
ENTRYPOINT [ "/usr/local/bin/php",  "-S", "0.0.0.0:80", "-t",  "/root" ]
