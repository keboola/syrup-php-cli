<?php

namespace Keboola\Syrup\Cli;

use Keboola\Syrup\Client;
use Keboola\Syrup\ClientException;

class Command extends \Symfony\Component\Console\Command\Command
{
    /**
     * @return Client
     * @throws ClientException
     */
    protected function init()
    {
        $token = getenv('KBC_STORAGE_TOKEN');
        if (!$token) {
            throw new ClientException("KBC_STORAGE_TOKEN not set.");
        }

        $client = new Client([
            'token' => $token
        ]);
        return $client;
    }
}
