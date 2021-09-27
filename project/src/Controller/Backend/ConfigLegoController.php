<?php

namespace App\Controller\Backend;


use App\Configurator\ConfigConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Idk\LegoBundle\Traits\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The LEGO controller for Config
 * @Route("/config")
 */
class ConfigLegoController extends AbstractLegoController
{

    use ControllerTrait;

    const LEGO_CONFIGURATOR = Configurator::class;

}
