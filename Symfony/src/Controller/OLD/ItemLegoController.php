<?php

namespace AppBundle\Controller;

use AppBundle\Configurator\ItemConfigurator as Configurator;
use Idk\LegoBundle\Controller\LegoController;
use Idk\LegoBundle\Traits\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CsvType;
use AppBundle\Entity\Item;

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
        $path = $pathImg = $this->get('kernel')->getRootDir().'/../data/export.zip';
        //die($path);
        $zip = new \ZipArchive();
        $zip->open($path, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        $pathImg = $this->get('kernel')->getRootDir().'/../data/src/static';
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($pathImg));
        foreach ($iterator as $key=>$value) {


            if ((strpos($key,'static/img') or strpos($key,'static/img/visuel') or strpos($key,'static/img/vignette')) && file_exists(realpath($key)) && is_file(realpath($key))) {
                if(strpos($key,'static/img')){
                    $pathInZip = 'img/'.substr($key, strpos($key,'static/img') + strlen('static/img/'));
                }
                $zip->addFile(realpath($key), '/'.$pathInZip);
            }
        }
        $zip->close();
        return new BinaryFileResponse($path);
    }

    function delete_files($dir) {
        $items = scandir($dir);
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }
            $path = $dir.'/'.$item;
            if (is_dir($path)) {
                $this->delete_files($path);
            } else {
                unlink($path);
            }
        }
        rmdir($dir);
    }

    //controller imbriqué
    public function uploadCsvAction($component){
        $request = $component->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $form = $this->createForm(CsvType::class);
        $form->handleRequest($request);
        $message = $error = null;
        if($request->isMethod('POST') and $request->request->get('upload_csv')){
            foreach($em->getRepository(Item::class)->findAll() as $item){
                $em->remove($item);
            }
            $em->flush();

            $fileExcel = $form->get('csv');
            $fileZip = $form->get('zip');
            $pathExcel = $fileExcel->getData()->getRealPath();
            $fileZip->getData();
            $pathZip = $fileZip->getData()->getRealPath();
            $zip = new \ZipArchive();
            $result_code = $zip->open($pathZip);
            if ($result_code === TRUE) {
                $pathImg = $this->get('kernel')->getRootDir().'/../data/src/static';
                $this->delete_files($pathImg);
                $zip->extractTo($pathImg);
                exec("chmod -R 0777 ".$pathImg);
                $zip->close();
            }else{
                $error = isset($ZIP_ERROR[$result_code])? $ZIP_ERROR[$result_code] : 'Unknown error.';
                return $this->render('AppBundle:Item:_upload_csv.html.twig', ['form' => $form->createView(), 'error' => $error, 'message' => null]);
            }
            /* @var \PHPExcel $objPhpExcel */
            $objPHPExcel = $this->get('phpexcel')->createPHPExcelObject($pathExcel);
            /* @var \PHPExcel_Worksheet $sheet */
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestDataColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL, TRUE, FALSE);
                $line = $rowData[0];
                $item = new Item();
                $item->setVar($line[0]);
                $item->setCode($line[1]);
                $item->setLibelle($line[2]);
                $item->setSubLibelle($line[3]);
                $item->setAide($line[4]);
                $item->setColor($line[5]);
                $item->setVignette($line[6]);
                $item->setCondition($line[7]);
                $item->setVisuel($line[8]);
                $item->setPrix($line[9]);
                $item->setPrix2($line[10]);
                $item->setUrl($line[11]);
                $em->persist($item);
            }
            $message = 'Les items ont bien été généré.';
            $em->flush();
        }

        return $this->render('AppBundle:Item:_upload_csv.html.twig', ['form' => $form->createView(), 'message' => $message, 'error' => $error]);
    }

}
