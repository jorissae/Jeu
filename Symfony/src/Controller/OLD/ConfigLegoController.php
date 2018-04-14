<?php

namespace AppBundle\Controller;


use AppBundle\Configurator\ConfigConfigurator as Configurator;
use Idk\LegoBundle\Controller\LegoController;
use Idk\LegoBundle\Traits\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The LEGO controller for Config
 * @Route("/config")
 */
class ConfigLegoController extends LegoController
{

    use Controller;

    const LEGO_CONFIGURATOR = Configurator::class;

}
