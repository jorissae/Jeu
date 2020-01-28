<?php

namespace App\Controller\Backend;

use App\Configurator\ItemConfigurator as Configurator;
use Idk\LegoBundle\Controller\AbstractLegoController;
use Idk\LegoBundle\Traits\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The admin list controller for Jeu
 * @Route("/item")
 */
class ItemLegoController extends AbstractLegoController
{

    use ControllerTrait;
    const LEGO_CONFIGURATOR = Configurator::class;


    /**
     *
     * @Route("/export_zip")
     */
    public function exportZipAction(Request $request){
        die('action zip');
    }



    //controller imbriqué
    public function uploadCsvAction($component){
        return new Response('ok');
    }

}
