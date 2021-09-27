<?php
namespace App\Controller;


use App\Configurator\UserConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The LEGO controller for User
 * @Route("/user")
 */
class UserLegoController extends AbstractController
{

    use \Idk\LegoBundle\Traits\ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

}
