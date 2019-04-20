<?php

namespace App\Configurator;


use App\Entity\LiaisonPlayDuration;
use App\Entity\Play;
use App\Entity\PlayComment;
use Idk\LegoBundle\Configurator\AbstractDoctrineORMConfigurator;
use Idk\LegoBundle\Component as CPNT;
use Idk\LegoMediaBundle\Brick\Attachment;

/**
 * The admin list configurator for Jeu
 */
class PlayConfigurator extends AbstractDoctrineORMConfigurator
{


    public function buildIndex(){
       //tester sans addAddComponent
       //tester avec id annoter de lego/field
        $actions = $this->addIndexComponent(CPNT\Action::class, ['actions' => [CPNT\Action::ADD]]);
        $filter = $this->addIndexComponent(CPNT\Filter::class,[]);
        $this->addIndexComponent(Attachment::class, []);

        $list = $this->addIndexComponent(CPNT\ListItems::class,  [
            'fields'=> ['name', 'logo', 'duration', 'genres', 'themes', 'editor', 'collections'],
            'can_modify_nb_entity_per_page' => true,
            'entity_per_page' => 20,
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE]
        ]);
        $list->add('attachments', ['label'=> 'Fichiers', 'twig'=> '<span class="label bg-blue">{{ lgo_count_attachment(view.entity) }}</span>']);
        $actions->add(CPNT\Action::EXPORT($list, 'xlsx'));
        $actions->add(CPNT\Action::EXPORT($list));
        //$filter2 = $this->addIndexComponent(CPNT\Filter::class,[]);
        //$filter->addComponent($list);
        //$list->add('nbPlayerMin',['label'=>'NBJ', 'edit_in_place'=>true]);
        $list->addPredefinedBulkAction(CPNT\ListItems::BULK_ACTION_DELETE);

       /* $list2 = $this->addIndexComponent(CPNT\ListItems::class,  [
            'fields'=> ['name', 'pictur'],
            'can_modify_nb_entity_per_page' => false,
            'entity_per_page' => 20,
            'dql' => 'b.age = 21',
            'entity_actions' => [CPNT\ListItems::ENTITY_ACTION_EDIT, CPNT\ListItems::ENTITY_ACTION_DELETE]
        ]);
        $list2->addPredefinedBulkAction(CPNT\ListItems::BULK_ACTION_DELETE);
        $actions->add(CPNT\Action::EXPORT($list2));
        $filter2->addComponent($list2);*/
        $this->addShowComponent(CPNT\Action::class, ['actions'=>[CPNT\Action::BACK]]);
        $this->addShowComponent(CPNT\Item::class,[]);
        $this->addShowComponent(Attachment::class, []);
        $this->addShowComponent(CPNT\Action::class, ['actions'=>[CPNT\Action::ADD]], PlayComment::class);
        $this->addShowComponent(CPNT\ListItems::class, ['entity_actions' => [CPNT\ListItems::ENTITY_ACTION_DELETE, CPNT\ListItems::ENTITY_ACTION_EDIT]], PlayComment::class);

        //$filter3 = $this->addShowComponent(CPNT\Filter::class,['fields'=>['nbPlayer']], LiaisonPlayDuration::class);
        //$list =  $this->addShowComponent(CPNT\ListItems::class,['fields'=>['duration.duration', 'nbPlayer']], LiaisonPlayDuration::class);
        //$filter3->addComponent($list);
        //$list->add('nbPlayer', ['sort'=>true]); //no same results (not search annotation)
        $this->addAddComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addAddComponent(CPNT\Form::class, []);

        $this->addEditComponent(CPNT\Action::class, ['actions' => [CPNT\Action::BACK]]);
        $this->addEditComponent(CPNT\Form::class, []);
        $this->addEditComponent(Attachment::class, []);
    }


    public function getEntityName()
    {
        return Play::class;
    }

    public function getTitle()
    {
        return 'Gestion des jeux';
    }

    static public function getControllerPath()
    {
        return 'app_backend_playlego';
    }
}
