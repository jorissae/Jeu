<?php

namespace App\Configurator;

use App\Entity\Editor;
use App\Form\EditeurType;

use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;
use App\Entity\Jeu2;

/**
 * The admin list configurator for Jeu
 */
class Editor2Configurator extends AbstractDoctrineORMConfigurator
{

    const ENTITY_CLASS_NAME = Editor::class;
    const TITLE = 'Gestion des éditeurs';

    public function buildAll(){

        $this->addIndexComponent(CPNT\Filter::class,[]);
        $this->addIndexComponent(CPNT\ListItems::class,  [
            'fields'=> ['name'],
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_DELETE],
            'bulk_actions' => [CPNT\ListItems::BULK_ACTION_DELETE]
        ]);

        $this->addShowComponent(CPNT\Action::class,['actions'=> [CPNT\Action::BACK]]);
        $this->addShowComponent(CPNT\Item::class,['fields'=> ['name']]);
    }

    /*static public function getControllerPath()
    {
        return 'app_backend_editorlego';
    }*/
}
