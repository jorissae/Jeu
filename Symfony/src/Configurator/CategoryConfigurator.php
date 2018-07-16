<?php

namespace App\Configurator;


use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;
use App\Entity\Category;

/**
 * The admin list configurator for Jeu
 */
class CategoryConfigurator extends AbstractDoctrineORMConfigurator
{

    public function buildIndex(){
         $this->addIndexComponent(CPNT\TreeItems::class,  [
            'fields'=> ['libelle'],
        ]);
    }


    public function getEntityName()
    {
        return Category::class;
    }

    public function getTitle()
    {
        return 'Gestion des category';
    }

    public function getControllerPath()
    {
        return 'app_backend_categorylego';
    }
}
