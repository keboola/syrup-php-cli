# syrup-php-cli

[![Build Status](https://travis-ci.org/keboola/syrup-php-cli.svg?branch=master)](https://travis-ci.org/keboola/syrup-php-cli)
[![Docker Repository on Quay](https://quay.io/repository/keboola/syrup-cli/status "Docker Repository on Quay")](https://quay.io/repository/keboola/syrup-cli)

PHP Command line interface for running component jobs

### Build

```
docker-compose build
```

### Run

```
docker-compose run --rm cli 
```

### Environment

```
$ cat .env
export KBC_STORAGEL_TOKEN=my_token
export KBC_JOBRUNNER_COMPONENTID=component_id
export KBC_JOBRUNNER_CONFIGURATIONID=configuration_id
export KBC_JOBRUNNER_TAG=the_tag_to_run
```

### Run Tests

```
docker-compose run --rm tests
```