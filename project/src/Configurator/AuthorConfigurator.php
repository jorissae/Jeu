<?php
namespace App\Configurator;

use App\Entity\Author;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;
/**
 * The LEGO configurator for Author */
class AuthorConfigurator extends AbstractDoctrineORMConfigurator
{

    const ENTITY_CLASS_NAME = Author::class;
    const TITLE = 'Gestion des authors';

    public function buildIndex()
    {
        $this->addIndexComponent(CPNT\Action::class, ['actions' => [CPNT\Action::ADD]]);
        $filter = $this->addIndexComponent(CPNT\Filter::class, []);
        $list = $this->addIndexComponent(CPNT\ListItems::class, [
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE],
            'bulk_actions' => [CPNT\ListItems::BULK_ACTION_DELETE]
        ]);
        //$filter->addComponent($list);

        $this->addAddComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addAddComponent(CPNT\Form::class, []);

        $this->addEditComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class, []);

        $this->addShowComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addShowComponent(CPNT\Item::class, []);
    }

    static public function getControllerPath()
    {
        return 'app_backend_authorlego';
    }
}
