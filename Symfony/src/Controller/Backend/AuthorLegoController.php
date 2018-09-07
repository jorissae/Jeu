<?php
namespace App\Controller\Backend;


use App\Configurator\AuthorConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The LEGO controller for Author
 * @Route("/author")
 */
class AuthorLegoController extends Controller
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
