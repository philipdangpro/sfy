<?php

namespace AppBundle\Command;

use AppBundle\Controller\DoctrineController;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\DescriptorHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;



/**
 * MyCommand is mine.
 */
class MyCommand extends ContainerAwareCommand
{
    private $command;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->ignoreValidationErrors();

        $this
            ->setName('mycommand')
            ->setDefinition(array(
                new InputArgument('command_name', InputArgument::OPTIONAL, 'The command name', 'mycommand'),
//                new InputOption('format', null, InputOption::VALUE_REQUIRED, 'foo bar baz', 'txt'),
//                new InputOption('raw', null, InputOption::VALUE_NONE, 'un autre'),
            ))
            ->setDescription('description de ma commande') //c'est ce qui s'affichera dans la valeur Help dans Help
        ;
    }

    public function setCommand(Command $command)
    {
        $this->command = $command;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('doctrine')->
        dump($input->getArguments());
        dump($input->getFirstArgument());
        dump($input->getOptions());
//        dump($doctrineController->indexSixAction());
    }
}
