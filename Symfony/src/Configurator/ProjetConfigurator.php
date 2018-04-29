<?php

namespace App\Configurator;

use App\Entity\Projet;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;


class ProjetConfigurator extends AbstractDoctrineORMConfigurator
{

    const ENTITY_CLASS_NAME = Projet::class;
    const TITLE = 'Gestion des projet';


    public function buildAll(){

        $this->addIndexComponent(CPNT\Filter::class,[]);
        $this->addIndexComponent(CPNT\ListItems::class,  [
            'can_modify_nb_entity_per_page' => true,
            'fields'=> ['code','ip','createdAt','email','nbVolet'],
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_DELETE, CPNT\ListItems::ENTITY_ACTION_SHOW],
            'bulk_actions' => [CPNT\ListItems::BULK_ACTION_DELETE]
        ])->addBreaker('ip', ['enable'=> false, 'header'=> 'Adresse IP']);

        $this->addShowComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addShowComponent(CPNT\Item::class, []);
        $this->addShowComponent(CPNT\Custom::class, ['src' => 'App:ProjetLego:showJson']);
    }

    public function getControllerPath()
    {
        return 'app_backend_projetlego';
    }
}
