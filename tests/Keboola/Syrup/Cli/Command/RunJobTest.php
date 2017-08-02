<?php

namespace Keboola\DeveloperPortal\Cli\Command\Test;

use Keboola\Syrup\Cli\Command\RunJob;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use PHPUnit\Framework\TestCase;

class RunJobTest extends TestCase
{
    public function testExecute()
    {
        $application = new Application();
        $application->add(new RunJob());
        $command = $application->find('run-job');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'  => $command->getName(),
            'componentId' => getenv('KBC_JOBRUNNER_COMPONENTID'),
            'configurationId' => getenv('KBC_JOBRUNNER_CONFIGURATIONID'),
            'tag' => getenv('KBC_JOBRUNNER_TAG')
        ));
        $this->assertEquals(0, $commandTester->getStatusCode());
    }
}
