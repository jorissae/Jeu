<?php
namespace App\Controller\Backend;


use App\Configurator\PlayerConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The LEGO controller for Player
 * @Route("/player")
 */
class PlayerLegoController extends Controller
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
