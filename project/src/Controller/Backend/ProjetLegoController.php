<?php

namespace App\Controller\Backend;

use App\Configurator\ProjetConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Idk\LegoBundle\Traits\ControllerTrait;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The admin list controller for Jeu
 * @Route("/projet")
 */
class ProjetLegoController extends AbstractLegoController
{

    use ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;

    public function showJsonAction($component){
        $request = $component->getRequest();
        /* @var \App\Entity\Projet $entity */
        $entity = $component->getConfigurator()->find($request->get('id'));
        $projet = $entity->getData();
        return $this->render('App:Projet:_show_json.html.twig', ['entity' => $entity, 'projet' => $projet]);
    }

}
