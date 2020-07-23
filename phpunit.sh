#!/usr/bin/env bash

# Tests
./vendor/bin/phpcs --standard=psr2 --ignore=vendor -n .
./vendor/bin/phpunit --verbose --debug
