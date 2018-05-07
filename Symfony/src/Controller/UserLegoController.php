<?php
namespace App\Controller;


use App\Configurator\UserConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The LEGO controller for User
 * @Route("/user")
 */
class UserLegoController extends Controller
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
