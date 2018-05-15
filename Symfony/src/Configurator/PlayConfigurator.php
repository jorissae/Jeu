<?php

namespace App\Configurator;


use App\Entity\Play;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;

/**
 * The admin list configurator for Jeu
 */
class PlayConfigurator extends AbstractDoctrineORMConfigurator
{


    public function buildIndex(){
       //tester sans addAddComponent
       //tester avec id annoter de lego/field
        $this->addIndexComponent(CPNT\Action::class, ['actions' => [CPNT\Action::ADD]]);
        $this->addIndexComponent(CPNT\Filter::class,[]);
        $this->addIndexComponent(CPNT\ListItems::class,  [
            'fields'=> ['name', 'pictur', 'nbPlayer', 'age', 'description'],
            'can_modify_nb_entity_per_page' => true,
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE]
        ]);

        $this->addShowComponent(CPNT\Item::class,[]);
        $list =  $this->addShowComponent(CPNT\ListItems::class,['fields'=>['duration.duration', 'nbPlayer']], LiaisonPlayDurationConfigurator::class);
        //$list->add('nbPlayer', ['sort'=>true]); //no same results (not search annotation)
        $this->addAddComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addAddComponent(CPNT\Form::class, []);

        $this->addEditComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class, []);
    }


    public function getEntityName()
    {
        return Play::class;
    }

    public function getTitle()
    {
        return 'Gestion des jeux';
    }

    public function getControllerPath()
    {
        return 'app_backend_playlego';
    }
}
