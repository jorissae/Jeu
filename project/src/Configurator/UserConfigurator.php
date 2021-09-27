<?php
namespace App\Configurator;

use App\Entity\User;
use App\Form\UserAdminType;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;
/**
 * The LEGO configurator for User */
class UserConfigurator extends AbstractDoctrineORMConfigurator
{

    const ENTITY_CLASS_NAME = User::class;
    const TITLE = 'Gestion des users';

    public function buildIndex()
    {
        $this->addIndexComponent(CPNT\Action::class, ['actions' => [CPNT\Action::ADD]]);
        $this->addIndexComponent(CPNT\Filter::class, []);
        $this->addIndexComponent(CPNT\ListItems::class, [
            'fields'=> ['username', 'roles'],
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE],
            'bulk_actions' => [CPNT\ListItems::BULK_ACTION_DELETE]
        ]);

        $this->addAddComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addAddComponent(CPNT\Form::class, ['form'=>UserAdminType::class]);

        $this->addEditComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class, ['form'=>UserAdminType::class]);

        $this->addShowComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addShowComponent(CPNT\Item::class, []);
    }

}
