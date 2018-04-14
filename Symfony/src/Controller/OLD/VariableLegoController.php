<?php

namespace AppBundle\Controller;

use AppBundle\Configurator\VariableConfigurator as Configurator;
use Idk\LegoBundle\Controller\LegoController;
use Idk\LegoBundle\Traits\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The admin list controller for Jeu
 * @Route("/variable")
 */
class VariableLegoController extends LegoController
{

    use Controller;
    const LEGO_CONFIGURATOR = Configurator::class;


}
