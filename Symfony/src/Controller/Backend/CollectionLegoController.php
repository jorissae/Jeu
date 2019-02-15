<?php
namespace App\Controller\Backend;


use App\Configurator\CollectionConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The LEGO controller for Collection
 * @Route("/collection")
 */
class CollectionLegoController extends Controller
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
