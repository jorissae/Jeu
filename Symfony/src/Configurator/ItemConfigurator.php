<?php

namespace AppBundle\Configurator;

use AppBundle\Entity\Item;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;
use Idk\LegoBundle\FilterType\ORM\NumberFilterType;
use Idk\LegoBundle\Lib\Actions\ListAction;


class ItemConfigurator extends AbstractDoctrineORMConfigurator
{

    const ENTITY_CLASS_NAME = Item::class;
    const TITLE = 'Gestion des items';


    public function buildAll(){
        $this->addIndexComponent(CPNT\Action::class,['actions' => [CPNT\Action::EXPORT_XLSX, new ListAction('Fichier Zip', ['route'=>'app_itemlego_exportzip'])]]);
        $this->addIndexComponent(CPNT\Custom::class, ['src' => 'AppBundle:ItemLego:uploadcsv']);
        $this->addIndexComponent(CPNT\Filter::class,[]);
        $list = $this->addIndexComponent(CPNT\ListItems::class,  [
            'can_modify_nb_entity_per_page' => true,
            'fields'=> ['libelle','subLibelle', 'code'],
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_DELETE, CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_SHOW],
            'bulk_actions' => [CPNT\ListItems::BULK_ACTION_DELETE]
        ]);
        //$list->addListenQueryParameter('p', 'page')->addListenQueryParameter('n','nbepp');
        $list->addBreaker('var', ['header' => 'Type','header_twig' =>'<strong>{{ title }}: {{ collection.name|capitalize }}</strong> ({{ collection.entities|length }} éléments)', 'enable' => true]);
        $this->addShowComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addShowComponent(CPNT\Item::class, []);

        $this->addEditComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class,['title'=>'Edition d\'un item']);
    }

    public function getControllerPath()
    {
        return 'app_itemlego';
    }
}
