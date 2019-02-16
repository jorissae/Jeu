<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Idk\LegoMediaBundle\Entity\Attachment;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class FixAttCommand extends Command
{
    protected static $defaultName = 'app:fix-att';
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach($this->em->getRepository(Attachment::class)->findall() as $att){
            $att->setPath(basename($att->getPath()));
            $this->em->persist($att);
            echo '*';
        }
        $this->em->flush();
        echo 'FLUSH';
    }
}
