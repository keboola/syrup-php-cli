#!/bin/bash
docker login -u="$QUAY_USERNAME" -p="$QUAY_PASSWORD" quay.io
docker tag keboola/syrup-cli quay.io/keboola/syrup-cli:$TRAVIS_TAG
docker tag keboola/syrup-cli quay.io/keboola/syrup-cli:latest
docker push quay.io/keboola/syrup-cli:$TRAVIS_TAG
docker push quay.io/keboola/syrup-cli:latest
