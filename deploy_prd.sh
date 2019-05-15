#!/bin/bash

ssh anderwijs-nl@ssh.pcextreme.nl << EOF

cd domains/anderwijs.nl/htdocs/aas2
php artisan down
git pull origin master
php composer.phar self-update
php composer.phar update
php artisan migrate
php artisan optimize
php artisan up

EOF