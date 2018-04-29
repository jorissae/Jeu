<?php

namespace App\Controller\Backend;

use App\Configurator\Jeu2Configurator as Configurator;
use Idk\LegoBundle\Controller\LegoController;
use Idk\LegoBundle\Traits\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * The admin list controller for Jeu
 * @Route("/jeu2")
 */
class Jeu2LegoController extends LegoController
{

    use Controller;

    const LEGO_CONFIGURATOR = Configurator::class;

    public function loulouAction($component, $entity){
        return new Response('<div class="row"><div class="col-md-12"><div class="box"><div class="box-body">'.$component->getId().'</div></div></div></div>');
    }

}
