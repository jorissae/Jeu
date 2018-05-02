<?php

namespace App\Configurator;

use App\Controller\Backend\Jeu2LegoController;
use App\Entity\Jeu2;
use App\Form\Jeu2Type;

use Idk\LegoBundle\Lib\Actions\BulkAction;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;

/**
 * The admin list configurator for Jeu
 */
class Jeu2Configurator extends AbstractDoctrineORMConfigurator
{

    const ENTITY_CLASS_NAME = Jeu2::class;
    const TITLE = 'Gestion des jeux';

    public function buildAll(){

        //Index
        $this->addIndexComponent(CPNT\Action::class,['movable'=>true,'actions'=>[CPNT\Action::ADD, CPNT\Action::EXPORT_CSV, CPNT\Action::EXPORT_XLSX, CPNT\Action::ORDER_COMPONENTS_RESET]]);
        $this->addIndexComponent(CPNT\Custom::class, ['movable'=>true,'src'=>Jeu2LegoController::class.'::loulouAction']);
        $this->addIndexComponent(CPNT\Filter::class,['movable'=>true]);
        $showItem = $this->addIndexComponent(CPNT\Item::class,['fields'=> ['editeur' ,'name', 'nbPlayer', 'age']]);
        $showItem->add('editeur.id', ['label'=>'Id editeur']);
        $list = $this->addIndexComponent(CPNT\ListItems::class,  [
            'can_modify_nb_entity_per_page' => true,
            'entity_per_page' => 20,
            'fields'=> ['id', 'editeur', 'name', 'nbPlayer','image', 'age'],
            'sorters' => [['name', 'DESC']],
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE, CPNT\ListItems::ENTITY_ACTION_SHOW],
            'bulk_actions' => [CPNT\ListItems::BULK_ACTION_DELETE, new BulkAction('loulou', ['choices'=> ['A'=>'B', 'C'=>'D'], 'route'=>'app_backend_jeulego_bulk'])]
        ]);
        $list->add('editeur.id', ['label'=>'Id editeur']);
        $editeurBreaker = $list->addBreaker('editeur.id', ['header'=>'Editeur', 'footer'=>'Fin Editeur']);
        $editeurBreaker->addBreaker('nbPlayer', ['header'=> 'nbPlayer']);
        $editeurBreaker->addBreaker('age', ['header'=> 'Age', 'enable' => true]);
        $list->addBreaker('age', ['header' => 'Age', 'footer' => 'Fin Age']);
        $this->addIndexComponent(CPNT\ListItems::class,[
            'fields'=>['name'],
            'can_modify_nb_entity_per_page' => true,
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE],
        ], EditeurConfigurator::class);

        //Add
        $this->addAddComponent(CPNT\Action::class,['actions'=> [CPNT\Action::BACK]]);
        $this->addAddComponent(CPNT\Form::class, []);

        //Edit
        $this->addEditComponent(CPNT\Action::class,['actions'=> [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class, []);

        //Show
        $this->addShowComponent(CPNT\Action::class,['actions'=> [CPNT\Action::BACK]]);
        $this->addShowComponent(CPNT\Item::class,['fields'=> ['name', 'nbPlayer', 'age', 'image']]);
        $this->addShowComponent(CPNT\ListItems::class,[
            'fields'=>['name'],
            'can_modify_nb_entity_per_page' => true,
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE],
        ], EditeurConfigurator::class);
    }

    public function getControllerPath()
    {
        return 'app_backend_jeu2lego';
    }
}
