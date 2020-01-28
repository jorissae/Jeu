<?php

namespace App\Controller\Backend;

use App\Configurator\CategoryConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The admin list controller for Jeu
 * @Route("/category")
 */
class CategoryLegoController extends AbstractLegoController
{

    use \Idk\LegoBundle\Traits\ControllerTrait;

    const LEGO_CONFIGURATOR = Configurator::class;

}
