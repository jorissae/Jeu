<?php

namespace App\Configurator;

use App\Entity\Editor;
use App\Form\EditeurType;

use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;

/**
 * The admin list configurator for Jeu
 */
class EditorConfigurator extends AbstractDoctrineORMConfigurator
{

    const ENTITY_CLASS_NAME = Editor::class;
    const TITLE = 'Gestion des éditeurs';

    public function buildAll(){

        $this->addIndexComponent(CPNT\Action::class,['actions'=>[CPNT\Action::ADD]]);
        $this->addIndexComponent(CPNT\Filter::class,[]);
        $this->addIndexComponent(CPNT\ListItems::class,  [
            'fields'=> ['name'],
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE],
            'bulk_actions' => [CPNT\ListItems::BULK_ACTION_DELETE]
        ]);

        $this->addAddComponent(CPNT\Action::class,['actions'=> [CPNT\Action::BACK]]);
        $this->addAddComponent(CPNT\Form::class, ['form' => EditeurType::class]);

        $this->addEditComponent(CPNT\Action::class,['actions'=> [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class, ['form' => EditeurType::class]);

        $this->addShowComponent(CPNT\Action::class,['actions'=> [CPNT\Action::BACK]]);
        $this->addShowComponent(CPNT\Item::class,['fields'=> ['name']]);
        $this->addShowComponent(CPNT\ListItems::class,[
            'fields'=>['id','editeur','name', 'age'],
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE],
        ], Jeu2Configurator::class);
    }

    public function getControllerPath()
    {
        return 'app_backend_editorlego';
    }
}
