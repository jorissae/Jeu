<?php
namespace App\Service;

use Idk\LegoBundle\Service\LegoFooterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\EntityManagerInterface;

class Footer implements LegoFooterInterface
{

    private $em;
    private $security;

    public function __construct(EntityManagerInterface $em, TokenStorageInterface $security) {
        $this->em = $em;
        $this->security = $security;
    }

    public function getTemplate(){
        return 'IdkLegoBundle:Layout:_footer.html.twig';
    }

    public function getVersion(){
        return '0.1 alpha';
    }

    public function getLibelle(){
        return 'Joris Saenger ! ';
    }

}
