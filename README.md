# developer-portal-php-client-v2
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