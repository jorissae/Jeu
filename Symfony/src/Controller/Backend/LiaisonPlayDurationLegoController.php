<?php
namespace App\Controller\Backend;


use App\Configurator\LiaisonPlayDurationConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The LEGO controller for LiaisonPlayDuration
 * @Route("/liaisonplayduration")
 */
class LiaisonPlayDurationLegoController extends AbstractLegoController
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
