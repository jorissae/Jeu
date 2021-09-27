<?php
namespace App\Controller\Backend;


use App\Configurator\CollectionConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The LEGO controller for Collection
 * @Route("/collection")
 */
class CollectionLegoController extends AbstractLegoController
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
