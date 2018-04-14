<?php

namespace App\Controller;

use App\Configurator\JeuConfigurator as Configurator;
use Idk\LegoBundle\Controller\LegoController;
use Idk\LegoBundle\Traits\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The admin list controller for Jeu
 * @Route("/jeu")
 */
class JeuLegoController extends LegoController
{

    use Controller;

    const LEGO_CONFIGURATOR = Configurator::class;

}
