<?php

namespace App\Controller;

use App\Configurator\ItemConfigurator as Configurator;
use Idk\LegoBundle\Controller\LegoController;
use Idk\LegoBundle\Traits\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Item;
use Symfony\Component\HttpFoundation\Response;

/**
 * The admin list controller for Jeu
 * @Route("/item")
 */
class ItemLegoController extends LegoController
{

    use Controller;
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
