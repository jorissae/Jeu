<?php

namespace App\Controller\Backend;

use App\Entity\Jeu2;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Configurator\Jeu2Configurator as Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Idk\LegoBundle\Traits\ControllerTrait;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * The admin list controller for Jeu
 * @Route("/jeu2")
 */
class Jeu2LegoController extends Controller
{

    use ControllerTrait;

    const LEGO_CONFIGURATOR = Configurator::class;

    /**
     * The index action
     *
     * @Route("/loulou")
     * @Method({"GET", "POST"})
     */
    public function loulouAction($component, $entity){
        return new Response('<div class="row"><div class="col-md-12"><div class="box"><div class="box-body">'.$component->getId().'</div></div></div></div>');
    }

    /**
     * The index action
     *
     * @Route("/buk")
     * @Method({"GET", "POST"})
     */
    public function bukAction(Request $request){
        foreach($request->get('ids') as $id){
            $entity = $this->getDoctrine()->getRepository(Jeu2::class)->find($id);
            $entity->setStar(!$entity->getStar());
            $this->getDoctrine()->getManager()->persist($entity);
            $this->getDoctrine()->getManager()->flush();
        }
        return new JsonResponse(['status'=>'ok', 'message'=>'1 élement fait']);
    }

    /**
     * The index action
     *
     * @Route("/test")
     * @Method({"GET", "POST"})
     */
    public function testAction(Request $request){
        $entity = $this->getDoctrine()->getRepository(Jeu2::class)->find($request->get('id'));
        $entity->setStar(!$entity->getStar());
        $this->getDoctrine()->getManager()->persist($entity);
        $this->getDoctrine()->getManager()->flush();
        return new JsonResponse(['status'=>'ok']);
    }

}
