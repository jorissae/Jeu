<?php

namespace App\Controller\Backend;

use App\Configurator\VariableConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Idk\LegoBundle\Traits\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The admin list controller for Jeu
 * @Route("/variable")
 */
class VariableLegoController extends AbstractLegoController
{

    use ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;


}
