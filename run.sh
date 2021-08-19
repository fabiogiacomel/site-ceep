#!/bin/bash

echo Copying the configuration example file
cp .env.example .env

echo Generate key
php artisan key:generate

echo Generate key
php artisan storage:link

echo Make migrations
php artisan migrate

echo Generate seed
php artisan db:seed

echo Generate JWT
#php artisan jwt:secret
