<?php
namespace App\Controller\Backend;


use App\Configurator\AuthorConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The LEGO controller for Author
 * @Route("/author")
 */
class AuthorLegoController extends AbstractLegoController
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
