<?php

namespace AppBundle\Controller;

use AppBundle\Configurator\ProjetConfigurator as Configurator;
use Idk\LegoBundle\Controller\LegoController;
use Idk\LegoBundle\Traits\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The admin list controller for Jeu
 * @Route("/projet")
 */
class ProjetLegoController extends LegoController
{

    use Controller;
    const LEGO_CONFIGURATOR = Configurator::class;

    public function showJsonAction($component){
        $request = $component->getRequest();
        /* @var \AppBundle\Entity\Projet $entity */
        $entity = $component->getConfigurator()->find($request->get('id'));
        $projet = $entity->getData();
        return $this->render('AppBundle:Projet:_show_json.html.twig', ['entity' => $entity, 'projet' => $projet]);
    }

}
