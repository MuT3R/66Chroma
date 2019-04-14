#!/bin/bash


# Convenience for basic provision templating

function replace_in_parameters {
    file=$1
    key=$2
    value=$3

    echo "replace $file with $key $value"

    sed -i "s,${key},${value},g" "${file}"
}


# Wait for mysql to be up

for i in {0..30};do
    mysqladmin ping -h${DATABASE_HOST} -p${DATABASE_PASSWORD} --silent
    rcode=$?
    if [ $rcode -eq 0 ]; then
      break
    else
        if [ $i -le 30 ]; then
            echo "wait for mysql to start"
            sleep 1
        else
            echo "timeout"
        fi
    fi
done

# Create wp source container

mkdir -p /var/www/html/wp/


# Wordpress provisioning

WP_PARAM_FILE="/var/www/html/wp/wp-config.php"

cp /var/www/html/wp-config.php.dist "${WP_PARAM_FILE}"

replace_in_parameters "${WP_PARAM_FILE}" "%database_name%" "${DATABASE_NAME}"
replace_in_parameters "${WP_PARAM_FILE}" "%database_user%" "${DATABASE_USER}"
replace_in_parameters "${WP_PARAM_FILE}" "%database_password%" "${DATABASE_PASSWORD}"
replace_in_parameters "${WP_PARAM_FILE}" "%database_host%" "${DATABASE_HOST}"
replace_in_parameters "${WP_PARAM_FILE}" "%debug_mode%" "${DEBUG_MODE}"
replace_in_parameters "${WP_PARAM_FILE}" "%wp_siteurl%" "${WP_SITEURL}"

/tools/composer install -d /var/www/html


# WP CLI

WP_CLI_CONFIG="/var/www/html/wp/wp-cli.yml"

/var/www/html/vendor/bin/wp option update home "${WP_HOME}" --allow-root --path=./wp
/var/www/html/vendor/bin/wp option update siteurl "${WP_SITEURL}" --allow-root --path=./wp
/var/www/html/vendor/bin/wp rewrite flush --hard --allow-root --path=./wp


# Access to content & dependencies

if [ ! -e "/var/www/html/wp/vendor" ]; then
    ln -s /var/www/html/vendor /var/www/html/wp/vendor
fi

if [ ! -e "/var/www/html/wp/content" ]; then
    ln -s /var/www/html/content /var/www/html/wp/content
fi

# Get new secrets

echo "<?php" > /var/www/html/secrets.php
curl "${SECRET_WORDPRESS_API}" >> /var/www/html/secrets.php


# Migrate URLs if needed

if [ ! -z "${MIGRATE_FROM}" ] && [ ! -z "${MIGRATE_TO}" ]; then

echo "Migrate posts guid urls from ${MIGRATE_FROM} to ${MIGRATE_TO}"

mysql -u${DATABASE_USER} \
-p${DATABASE_PASSWORD} \
-h${DATABASE_HOST} ${DATABASE_NAME} \
-e"UPDATE chroma_posts SET guid = REPLACE(guid, '${MIGRATE_FROM}', '${MIGRATE_TO}');"

echo "Migrate postmeta urls from ${MIGRATE_FROM} to ${MIGRATE_TO}"

mysql -u${DATABASE_USER} \
-p${DATABASE_PASSWORD} \
-h${DATABASE_HOST} ${DATABASE_NAME} \
-e"UPDATE chroma_postmeta SET meta_value = REPLACE(meta_value, '${MIGRATE_FROM}', '${MIGRATE_TO}');"

echo "migration done"

fi

# Run the server

docker-php-entrypoint "$@"
