#!/bin/bash

source ./env

if [[ $1 == "-f" ]]; then
    docker-compose down --remove-orphans --rmi all -v
fi

docker-compose build && docker-compose up -d
