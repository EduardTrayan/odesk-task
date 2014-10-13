<?php

namespace Eduardtrayan\Tests\Commands;

use Eduardtrayan\Commands\PrintArrayCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class PrintArrayCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $application = new Application();
        $application->add(new PrintArrayCommand());

        $command = $application->find('array:print');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));

        $this->assertRegExp('/Name/', $commandTester->getDisplay());
        $this->assertRegExp('/Color/', $commandTester->getDisplay());
        $this->assertRegExp('/Element/', $commandTester->getDisplay());
        $this->assertRegExp('/Likes/', $commandTester->getDisplay());
    }
}
