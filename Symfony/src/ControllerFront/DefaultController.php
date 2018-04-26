<?php
namespace App\ControllerFront;

use Idk\LegoBundle\Service\Tag\ComponentChain;
use Idk\LegoBundle\Service\Tag\WidgetChain;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller{


    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        return new Response('ok');
        //return $this->render('Default/dashboard.html.twig', []);
    }
}
