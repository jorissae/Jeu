<?php

namespace AppBundle\Controller;

use AppBundle\Configurator\UserConfigurator as Configurator;
use Idk\LegoBundle\Controller\LegoController;
use Idk\LegoBundle\Traits\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The admin list controller for User
 * @Route("/user")
 */
class UserLegoController extends LegoController
{
    use Controller;

    const LEGO_CONFIGURATOR = Configurator::class;
}
