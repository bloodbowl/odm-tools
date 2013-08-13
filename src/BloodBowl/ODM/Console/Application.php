<?php

namespace BloodBowl\ODM\Console;

use \Pimple;
use \Symfony\Component\Console\Application as BaseApplication;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Input\ArgvInput;
use \Symfony\Component\Console\Output\OutputInterface;

use \BloodBowl\ODM\Console\Command\Player\PlayerImportCommand;

class Application extends BaseApplication
{
    protected $container;

    public function doRun(InputInterface $input, OutputInterface $output)
    {
        $this->add(new PlayerImportCommand())

        return parent::doRun($input, $output);
    }

    protected function setupConsole()
    {
        $container = $this->getContainer();
        $container->setShared('console.commands.player.import', function($c) {
            return new Console\Command\RunCommand;
        });

        $container->setShared('console.commands.player.import', function($c) {
            return new Console\Command\RunCommand;
        });
    }


    public function getContainer()
    {
        if (!$this->container) {
            $this->container = new Pimple();
        }
        return $this->container;
    }
}