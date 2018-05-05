<?php

namespace App\Controller\Backend;

use App\Configurator\ProjetConfigurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Idk\LegoBundle\Traits\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * The admin list controller for Jeu
 * @Route("/projet")
 */
class ProjetLegoController extends Controller
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
