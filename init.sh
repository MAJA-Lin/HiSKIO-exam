#!/bin/bash

# Initialize laradock environment
if [ ! -f ./docker/.env ]; then
    echo "Docker compose dotenv does not exist. Initializing..."
    cp ./docker-compose-env ./docker/.env
fi

# Initialize laravel environment
if [ ! -f ./prova/.env ]; then
    echo "Laravel dotenv does not exist. Initializing..."
    cp ./laravel-env ./prova/.env
fi

# Check if docker is installed
if [ ! -x "$(command -v docker)" ]; then
    echo "Install docker first."
    exit
fi

# Check if docker-compose is installed
if [ ! -x "$(command -v docker-compose)" ]; then
    echo "Install docker-compose first."
    exit
fi

# Overwrite nginx default site conf
/bin/cp -f ./default.conf ./docker/nginx/sites/default.conf

# Overwrite Caddy file
/bin/cp -f ./Caddyfile ./docker/caddy/caddy/Caddyfile
/bin/cp -f ./caddy-dockerfile ./docker/caddy/Dockerfile

# Overwrite docker-compose.yml for certbot configuration
/bin/cp -f ./docker-compose.yml ./docker/docker-compose.yml

# Start services
cd ./docker
# docker-compose up certbot
# docker-compose up -d php-fpm redis workspace nginx
docker-compose up -d caddy php-fpm redis workspace

# Install package dependency
docker-compose exec workspace composer install
# Setup application key
docker-compose exec workspace php artisan key:generate