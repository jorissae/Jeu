<?php

namespace App\Configurator;

use App\Entity\Step;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;
use Idk\LegoBundle\Lib\Actions\ListAction;


class StepConfigurator extends AbstractDoctrineORMConfigurator
{

    const ENTITY_CLASS_NAME = Step::class;
    const TITLE = 'Gestion des steps';


    public function buildAll(){
        $this->addIndexComponent(CPNT\ListItems::class,  [
            'can_modify_nb_entity_per_page' => true,
            'fields'=> ['configurateur','label','icon'],
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT]
        ])->addBreaker('configurateur', ['enable'=> true]);

        $this->addEditComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class,['title'=>'Edition d\'un step']);
    }

    public function getControllerPath()
    {
        return 'app_steplego';
    }
}
