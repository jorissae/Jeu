<?php
namespace App\Controller\Backend;


use App\Configurator\LiaisonPlayDurationConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The LEGO controller for LiaisonPlayDuration
 * @Route("/liaisonplayduration")
 */
class LiaisonPlayDurationLegoController extends Controller
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
