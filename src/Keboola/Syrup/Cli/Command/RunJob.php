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
            "config" => $input->getArgument('configurationId'),
            "tag" => $input->getArgument('tag')
        ];

        $jobResult = $client->runAsyncAction(
            'docker/' . $input->getArgument('componentId') .  "/run",
            "POST",
            $options
        );
        $output->writeln(json_encode($jobResult));
    }
}
