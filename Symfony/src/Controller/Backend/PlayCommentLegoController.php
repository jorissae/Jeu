<?php
namespace App\Controller\Backend;


use App\Configurator\PlayCommentConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The LEGO controller for PlayComment
 * @Route("/playcomment")
 */
class PlayCommentLegoController extends AbstractLegoController
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
