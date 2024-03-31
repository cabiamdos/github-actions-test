
FROM php:7.4.2
COPY --from=composer /user/bin/composer /user/bin/composer

WORKDIR /usr/src/app
COPY . .
RUN apt update
RUN apt install zip -y
RUN composer install
ENTRYPOINT ["php", "/usr/src/app/script.php"]