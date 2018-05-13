<?php

namespace App\Controller\Backend;

use App\Configurator\EditorConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Idk\LegoBundle\Traits\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The admin list controller for Jeu
 * @Route("/editeur")
 */
class EditorLegoController extends Controller
{

    use ControllerTrait;

    const LEGO_CONFIGURATOR = Configurator::class;

}
