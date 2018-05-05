<?php

namespace App\Controller\Backend;


use App\Configurator\ConfigConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Idk\LegoBundle\Traits\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The LEGO controller for Config
 * @Route("/config")
 */
class ConfigLegoController extends Controller
{

    use ControllerTrait;

    const LEGO_CONFIGURATOR = Configurator::class;

}
