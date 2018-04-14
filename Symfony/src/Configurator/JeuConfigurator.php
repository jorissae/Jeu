<?php

namespace App\Configurator;


use App\Entity\Jeu;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;

/**
 * The admin list configurator for Jeu
 */
class JeuConfigurator extends AbstractDoctrineORMConfigurator
{


    public function buildIndex(){
       //tester sans addAddComponent
       //tester avec id annoter de lego/field
        $this->addIndexComponent(CPNT\Action::class, ['actions' => [CPNT\Action::ADD]]);
        $this->addIndexComponent(CPNT\Filter::class,[]);
        $this->addIndexComponent(CPNT\ListItems::class,  ['columns'=> ['name', 'nbPlayer', 'age']]);

        $this->addAddComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addAddComponent(CPNT\Form::class, []);

        $this->addEditComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class, []);
    }


    public function getEntityName()
    {
        return Jeu::class;
    }

    public function getTitle()
    {
        return 'Gestion des jeu';
    }

    public function getControllerPath()
    {
        return 'app_jeulego';
    }
}
