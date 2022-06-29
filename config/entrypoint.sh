#!/usr/bin/env bash
if [ -z "$WORKER" ]
then
  service nginx start
  php-fpm
else
  service nginx start
  # php-fpm & /usr/local/bin/php /var/www/app/artisan horizon
fi