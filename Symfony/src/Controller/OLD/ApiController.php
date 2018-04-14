<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Projet;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Item;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Step;


/**
 * @Route("/api", name="api")
 */
class ApiController extends Controller
{
    /**
     * @Route("", name="api_post")
     */
    public function apiPostAction(Request $request)
    {
        $content = json_decode($request->getContent(), true);
        $changeCode = false;
        $em = $this->getDoctrine()->getEntityManager();
        if(isset($content['code']) and $content['code']){
            $projet = $em->getRepository(Projet::class)->findOneBy(['code'=>$content['code']]);
            if($content['email']){
                $projet->setEmail($content['email']);
            }
        }else{
            $projet = new Projet();
            $projet->setIp($request->getClientIp());
            $projet->setCode(base64_encode(uniqid() . ' secretidsolar'));
            $changeCode = true;
            $projet->setEmail($content['email']);
        }
        $projet->setData($content['data']);
        $projet->setNbVolet(count($content['data']['volets']));
        $qte = 0;
        foreach($content['data']['volets'] as $volet){
            if(isset($volet['qte'])){
                $qte+= $volet['qte'];
            }
        }
        $projet->setNbVoletWithQte($qte);
        $em->persist($projet);
        $em->flush();
        if($changeCode){
            $projet->setCode($projet->getId().rand(0,99));
            $em->persist($projet);
            $em->flush();
        }


        $response = ['status' => 'ok', 'code' => $projet->getCode()];
        return new JsonResponse($response);
    }

    /**
     * @Route("/get/{code}", name="api_get")
     * @Method("GET")
     */
    public function apiGetAction(Request $request, $code)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $projet = $em->getRepository(Projet::class)->findOneBy(['code'=>$code]);
        if($projet) {
            $response = ['status' => 'ok', 'projet' => $projet->getData(), 'email' => $projet->getEmail()];
        }else{
            $response = ['status' => 'nok'];
        }
        return new JsonResponse($response);
    }

    /**
     * @Route("/assets/{path}", name="api_assets", requirements={"path"=".+"})
     * @Method("GET")
     */
    public function apiAssetsAction(Request $request, $path)
    {
        return new BinaryFileResponse($this->get('kernel')->getRootDir().'/../data/src/'.$path);
    }

    /**
     * @Route("/volet/img/{code}/{noVolet}", name="api_volet_img")
     * @Method("GET")
     */
    public function apiVoletImgAction(Request $request, $code, $noVolet)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $projet = $em->getRepository(Projet::class)->findOneBy(['code' => $code]);

        $volet = $projet->getData()['volets'][$noVolet];

        $path = $this->get('kernel')->getRootDir().'/../data/data.json';
        $content = json_decode(file_get_contents($path), true);
        $background = new \Imagick($this->get('kernel')->getRootDir().'/../data/src/'.$content['configs'][$volet['noconfig']]['base_visuel']);
        foreach($volet as $key => $item){
            if(isset($item['visuel']) and $item['visuel']){
                $path = preg_replace_callback("#[ +']*v.([a-z0-9_]+).code[ +']*#i", function($matches) use ($volet){
                    return $volet[$matches[1]]['code'];
                }, $item['visuel']);
                $path = $this->get('kernel')->getRootDir().'/../data/src/static/img/visuel/'.str_replace("'","",$path);
                $background->compositeImage(new \Imagick($path), \Imagick::COMPOSITE_DEFAULT, 0, 0);
            }
        }
        $response = new Response($background);
        $response->headers->set('Content-type', 'image/png');
        return $response;
    }

    public function isBis($annee) {
        $annee = (int)$annee;
        if($annee <= 0) return false;
        if( (is_int($annee/4) && !is_int($annee/100)) || is_int($annee/400)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function calcIdDate($date){
        $nbBis = 0;
        $y = $date[0];
        for($i=0; $i < $y; $i++){
            if($this->isBis($i)){
                $nbBis++;
            }
        }

        $lastYear = $y-1;
        $nbBis = floor(($lastYear /4 - floor($lastYear/100)) + floor($lastYear/400));
        if($y <= 0) $nbBis = 0;
        $nbday = $date[0] * 365 + $nbBis; //years

        if(!$this->isBis($y)){
            $months = [0,31,59,90,120,151,181,212,243,273,304,334,365];
        }else{
            $months = [0,31,60,91,121,152,182,213,244,274,305,335,366];
        }

        $nbday += $months[$date[1]-1];
        $nbday += $date[2];
        return base_convert($nbday + 14000000000 * 365,10,36);
    }

    public function calcDate($idDate){
        //echo '[';
        $nbDay = base_convert($idDate, 36, 10);
        $nbDay -= 14000000000 * 365;
        if($nbDay >= 0) {
            $nbDayForYear = 0;
            $last = 0;
            $i = 0;
            $bis=0;
            //die();

            //opti
            /*
            $y = (floor($nbDay / 366))-1;
            echo $y;
            echo '-';
            $y-=1;
            $nbBis = floor(($y /4 - floor($y/100)) + floor($y/400));
            $y+=1;
            echo $nbBis;
            echo '-nbdayY=';
            $nbDayForYear = $y * 365 + $nbBis;
            echo $nbDayForYear;
            echo '-nbday=';
            echo $nbDay;
            echo '-';
            //*/
            //end opti
            $i=0;
            while ($nbDayForYear < $nbDay) {

                //$y++;
                //echo $y.':';
                if ($this->isBis($i)) {
                    //echo 'B';
                    $nbDayForYear += 366;
                    $last = $nbDayForYear - 366;
                    $bis++;
                } else {
                    //echo 'N';
                    $nbDayForYear += 365;
                    $last = $nbDayForYear - 365;
                }
                //echo '.';
                $i++;

            }
            $y = $i - 1;
            //$y -= 1;
            //echo '('.$nbDay.'-'.$last.'='.($nbDay-$last).'';
            $nbDay -= $last;
        }else{
            $y = floor($nbDay / 365);
            if(!($nbDay % 365)){
                $y--;
            }
            $nbDay = 365 + ($nbDay % 365);
        }
        if(!$this->isBis($y)){
            $months = [0,31,59,90,120,151,181,212,243,273,304,334,365];
        }else{
            $months = [0,31,60,91,121,152,182,213,244,274,305,335,366];
        }
        $m =1;
        for($i=0;$i<=12;$i++){
            if($nbDay > $months[$i] && $nbDay <= $months[$i+1]){
                $nbDay-=$months[$i];
                $m = $i+1;
                break;
            }
        }
        //echo ']';
        return [$y,$m,$nbDay];
    }

    /**
     * @Route("/json", name="api_json")
     * @Method("GET")
     */
    public function apiJsonAction(Request $request)
    {
        $s = microtime(true);
        $date = [1,1,1];
        $idDate = $this->calcIdDate($date);
        //die();

        $date = $this->calcDate($idDate);
        print_r($date);
        $nb = base_convert($idDate,36,10);
        echo '<hr/>';
        $dt = \DateTime::createFromFormat('d/m/Y', '1/1/1');
        $dtstring = $dt->format('j/n/').(int)$dt->format('Y');
        echo $idDate .'--->'.$date[2].'/'.$date[1].'/'.$date[0].' | '. $dtstring;
        echo '<hr/>';
        for($i=1; $i <=5000; $i++){
            $idDate = base_convert($nb+$i,10,36);
            $date = $this->calcDate($idDate);
            $dt->add(new \DateInterval('P1D'));
            $dtstring = $dt->format('j/n/').(int)$dt->format('Y');
            $dstring = $date[2].'/'.$date[1].'/'.$date[0];
            if($dtstring != $dstring) {
                echo 'ERR: '.$idDate . '--->' . $dstring . ' | ' . $dtstring.' ----'.$this->calcIdDate($date);
                echo '<br/>';
            }else{
                //echo 'OKK: '.$idDate . '--->' . $dstring . ' | ' . $dtstring;
                //echo '<br/>';
            }
        }
        echo (microtime(true) - $s) * 1;
        //$date = $this->calcDate($idDate);
        //print_r($date);

        die();
        $em = $this->getDoctrine()->getEntityManager();

        $items = $em->getRepository(Item::class)->findAll();
        $steps = $em->getRepository(Step::class)->findBy(['configurateur'=>'global']);

        $path = $this->get('kernel')->getRootDir().'/../data/data.json';

        $content = json_decode(file_get_contents($path), true);
        $content['steps'] = [];
        $content['items'] = [];

        foreach($items as $item){
            $content['items'][] = $item->toArray();
        }
        foreach($steps as $step){
            $content['steps'][] = $step->toArray();
        }

        foreach($content['configs'] as $k => $config){
            $content['configs'][$k]['steps'] = [];
            foreach($em->getRepository(Step::class)->findBy(['configurateur'=>$content['configs'][$k]['name']]) as $step){
                $content['configs'][$k]['steps'][] = $step->toArray();
            }
        }

        return new JsonResponse($content);
    }

    /**
     * @Route("/send/{code}", name="api_send")
     * @Method("GET")
     */
    public function apiSendAction(Request $request, \Swift_Mailer $mailer, $code)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $projet = $em->getRepository(Projet::class)->findOneBy(['code'=>$code]);
        $host = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'])? 'https':'http').'://'.$_SERVER['HTTP_HOST'];

        //die($this->getParameter('api_email') . '-->' . $projet->getEmail());
        $message = (new \Swift_Message('Récapitulatif du projet '. $code))
            ->setFrom($this->getParameter('api_email'))
            ->setTo($projet->getEmail())
            ->setBody($this->renderView('AppBundle:Emails:recap2.html.twig',['data' => $projet->getData(), 'code' => $code, 'host'=>$host]), 'text/html')
            ->addPart($this->renderView('AppBundle:Emails:recap2.txt.twig',['data' => $projet->getData(), 'code' => $code]), 'text/plain');
        $mailer->send($message);

        $response = ['status' => 'ok', 'projet' => $projet->getData(), 'email' => $projet->getEmail()];
        //die(print_r($projet->getData()['volets'][0]['teinte_fond_vr']));
        return new JsonResponse($response);/*
        return new Response($this->renderView('AppBundle:Emails:recap2.html.twig',['data' => $projet->getData(), 'code' => $code, 'host'=>$host]));//*/
    }




}
