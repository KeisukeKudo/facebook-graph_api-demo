#! /bin/bash

# Run in php container.
TEMP_DIR=temp-project
echo "Laravel version to install is ${LARAVEL_VERSION}."
composer create-project laravel/laravel="${LARAVEL_VERSION}" ${TEMP_DIR} --prefer-dist
shopt -s dotglob
mv -f ./${TEMP_DIR}/* ./
rm -rf ./${TEMP_DIR}
