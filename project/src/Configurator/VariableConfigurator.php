<?php

namespace App\Configurator;

use App\Entity\Variable;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;


class VariableConfigurator extends AbstractDoctrineORMConfigurator
{

    const ENTITY_CLASS_NAME = Variable::class;
    const TITLE = 'Gestion des variables';


    public function buildAll(){
        $this->addIndexComponent(CPNT\ListItems::class,  [
            'can_modify_nb_entity_per_page' => true,
            'fields'=> ['step','var', 'widget', 'img', 'label'],
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT]
        ])->addBreaker('step', ['enable'=> true]);

        $this->addEditComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class,['title'=>'Edition d\'un step']);
    }

    static public function getControllerPath()
    {
        return 'app_backend_variablelego';
    }
}
