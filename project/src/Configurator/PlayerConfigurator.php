<?php
namespace App\Configurator;

use App\Entity\PlayComment;
use App\Entity\Player;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;
/**
 * The LEGO configurator for Player */
class PlayerConfigurator extends AbstractDoctrineORMConfigurator
{

    const ENTITY_CLASS_NAME = Player::class;
    const TITLE = 'Gestion des players';

    public function buildIndex()
    {
        $this->addIndexComponent(CPNT\Action::class, ['actions' => [CPNT\Action::ADD]]);
        $this->addIndexComponent(CPNT\Filter::class, []);
        $this->addIndexComponent(CPNT\ListItems::class, [
            'fields' => ['pseudo', 'firstname','lastname'],
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE, CPNT\ListItems::ENTITY_ACTION_SHOW],
            'bulk_actions' => [CPNT\ListItems::BULK_ACTION_DELETE]
        ]);

        $this->addAddComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addAddComponent(CPNT\Form::class, []);

        $this->addEditComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class, []);

        $this->addShowComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addShowComponent(CPNT\Item::class, []);
        $this->addShowComponent(CPNT\ListItems::class, ['entity_actions'=>[CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE, CPNT\ListItems::ENTITY_ACTION_SHOW]], PlayComment::class);
    }

    static public function getControllerPath()
    {
        return 'app_backend_playerlego';
    }
}
