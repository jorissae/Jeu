<?php

namespace App\Configurator;


use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;
use App\Entity\Category;
use Idk\LegoBundle\Lib\Path;

/**
 * The admin list configurator for Jeu
 */
class CategoryConfigurator extends AbstractDoctrineORMConfigurator
{

    public function buildIndex(){
         $this->addIndexComponent(CPNT\Action::class,['actions' => [CPNT\Action::ADD]]);
         $this->addIndexComponent(CPNT\TreeItems::class,  [
            'fields'=> ['libelle','resume'],
        ]);
        $this->addIndexComponent(CPNT\ListItems::class,  [
            'fields'=> ['libelle','resume'],'tree'=>true,
        ]);
        $this->addAddComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addAddComponent(CPNT\Form::class, []);

        $this->addEditComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class, []);
    }


    public function getEntityName()
    {
        return Category::class;
    }

    public function getTitle()
    {
        return 'Gestion des category';
    }

    static public function getControllerPath()
    {
        return 'app_backend_categorylego';
    }

}
