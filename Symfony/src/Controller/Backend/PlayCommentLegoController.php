<?php
namespace App\Controller\Backend;


use App\Configurator\PlayCommentConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The LEGO controller for PlayComment
 * @Route("/playcomment")
 */
class PlayCommentLegoController extends Controller
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
