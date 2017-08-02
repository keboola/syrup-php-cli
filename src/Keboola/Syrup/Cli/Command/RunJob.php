<?php

namespace Keboola\Syrup\Cli\Command;

use Keboola\Syrup\Cli\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunJob extends Command
{
    protected function configure()
    {
        $this
            ->setName('run-job')
            ->addArgument('componentId', InputArgument::REQUIRED, 'Component ID')
            ->addArgument('configurationId', InputArgument::REQUIRED, 'Configuration ID')
            ->addArgument('tag', InputArgument::REQUIRED, 'Repository Image Tag')
            ->setDescription('Run a component configuration against a specified image tag')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = $this->init();

        $options = [
            "config" => $input->getArgument('configurationId')
        ];

        $jobResult = $client->runAsyncAction(
            'docker/' . $input->getArgument('componentId') .  "/run/tag/" . $input->getArgument('tag'),
            "POST",
            $options
        );
        if ($jobResult['status'] === 'success') {
            exit(0);
        } else {
            exit(1);
        }
    }
}
