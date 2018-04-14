<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\CsvType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Item;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Projet;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        setlocale(LC_TIME, 'fr_FR.utf8','fra');
        $date = new \DateTime();
        $date->setTime(0,0,0);
        $date->setDate(date('Y')-1,date('m'), 1);
        $date->add(new \DateInterval('P1M'));
        $chart = ['label'=>[], 'nbProjet'=>[], 'nbVolet'=>[]];
        $data = $this->getDoctrine()->getRepository(Projet::class)->calculateCountableData();
        while(count($chart['label']) < 12){
            $chart['label'][] = ucfirst(strftime("%B",$date->getTimestamp()));
            $values = $this->getDoctrine()->getRepository(Projet::class)->calculateCountableData(clone $date);
            $chart['nbProjet'][] = $values['nbProjet'];
            $chart['nbVolet'][] = ($values['nbVolet'])? $values['nbVolet']:0;
            $date->add(new \DateInterval('P1M'));
        }
        return $this->render('AppBundle:Default:dashboard.html.twig', ['chart'=>$chart, 'data' => $data]);
    }
}
