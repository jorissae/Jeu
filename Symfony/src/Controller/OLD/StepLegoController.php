<?php

namespace AppBundle\Controller;

use AppBundle\Configurator\StepConfigurator as Configurator;
use Idk\LegoBundle\Controller\LegoController;
use Idk\LegoBundle\Traits\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The admin list controller for Jeu
 * @Route("/step")
 */
class StepLegoController extends LegoController
{

    use Controller;
    const LEGO_CONFIGURATOR = Configurator::class;


}
