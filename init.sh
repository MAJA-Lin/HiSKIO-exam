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

