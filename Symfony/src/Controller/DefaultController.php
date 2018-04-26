<?php
namespace App\Controller;

use Idk\LegoBundle\Service\Tag\ComponentChain;
use Idk\LegoBundle\Service\Tag\WidgetChain;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller{


    /**
     * @Route("/", name="homepage")
     */
    public function index(WidgetChain $widgetChain, ComponentChain $componentChain)
    {
        return $this->render('Default/dashboard.html.twig', ['widgets'=>$widgetChain->getWidgets()]);
    }
}
