<?php
namespace App\Controller\Backend;


use App\Configurator\PlayerConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The LEGO controller for Player
 * @Route("/player")
 */
class PlayerLegoController extends AbstractLegoController
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
