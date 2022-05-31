# syrup-php-cli

[![Build Status](https://travis-ci.org/keboola/syrup-php-cli.svg?branch=master)](https://travis-ci.org/keboola/syrup-php-cli)
[![Docker Repository on Quay](https://quay.io/repository/keboola/syrup-cli/status "Docker Repository on Quay")](https://quay.io/repository/keboola/syrup-cli)

PHP Command line interface for running component jobs

### Run

```
docker pull quay.io/keboola/syrup-cli:latest
docker run --rm -e KBC_STORAGE_TOKEN=[token] quay.io/keboola/syrup-cli:latest run-job [componentId] [configId] [tag] 
```


### Build

```
docker-compose build
```

### Environment

```
$ cat .env
export KBC_STORAGEL_TOKEN=my_token
export KBC_JOBRUNNER_COMPONENTID=component_id
export KBC_JOBRUNNER_CONFIGURATIONID=configuration_id
export KBC_JOBRUNNER_TAG=the_tag_to_run
export SYRUP_URL=https://syrup.eu-central-1.keboola.com
```

Note: `SYRUP_URL` is optional, default value is `https://syrup.keboola.com`

### Run Tests

```
docker-compose run --rm tests
```

## License

MIT licensed, see [LICENSE](./LICENSE) file.
