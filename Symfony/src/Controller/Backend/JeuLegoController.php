<?php

namespace App\Controller\Backend;

use App\Configurator\JeuConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The admin list controller for Jeu
 * @Route("/jeu")
 */
class JeuLegoController extends Controller
{

    use \Idk\LegoBundle\Traits\ControllerTrait;

    const LEGO_CONFIGURATOR = Configurator::class;

}
