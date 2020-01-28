<?php

namespace App\Controller\Backend;

use App\Configurator\EditorConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Idk\LegoBundle\Traits\ControllerTrait;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The admin list controller for Jeu
 * @Route("/editeur")
 */
class EditorLegoController extends AbstractLegoController
{

    use ControllerTrait;

    const LEGO_CONFIGURATOR = Configurator::class;

}
