<?php
namespace Tbb\Crud\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

//php bin/magento list
class CrudCreate extends Command
{
    const NAME = 'name';

    protected function configure()
    {

        $options = [
            new InputOption(
                self::NAME,
                null,
                InputOption::VALUE_REQUIRED,
                'Name'
            )
        ];

        $this->setName('example:tbbcrud')
            ->setDescription('Demo command line')
            ->setDefinition($options);

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //php bin/magento example:tbbcrud --name "Nour"
        if ($name = $input->getOption(self::NAME)) {

            $output->writeln("Hello " . $name);


        } else {

            $output->writeln("Hello World");

        }

        return $this;

    }
}