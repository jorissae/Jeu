<?php
namespace App\Service;


use Idk\LegoBundle\Lib\LayoutItem\LabelItem;
use Idk\LegoBundle\Lib\LayoutItem\MenuItem;
use Idk\LegoBundle\Lib\Path;
use Idk\LegoBundle\Service\Menu as Base;

class Menu extends  Base
{



    public function getItems(){
        $return = [];
        $return[] = new MenuItem('CHEZ LESLIE', ['type'=>MenuItem::TYPE_HEADER]);
        $return[] = new MenuItem('Dashboard', [
            'icon' => 'dashboard',
            'path' => new Path('idk_lego_dashboard'),
            //'labels'=> [new LabelItem(5, ['css_class'=>'bg-red'])],
            //'children' => [new MenuItem('index',['path'=>new Path('idk_lego_dashboard'), 'icon'=>'circle-o'])]
        ]);

        $return[] = new MenuItem('Jeu', ['path' => new Path('app_backend_playlego_index'), 'icon' => 'gamepad']);
        $return[] = new MenuItem('Collection', ['path' => new Path('app_backend_collectionlego_index'), 'icon' => 'gamepad']);
        $return[] = new MenuItem('Joueur', ['path' => new Path('app_backend_playerlego_index'), 'icon' => 'gamepad']);
        $return[] = new MenuItem('Éditeur', ['path' => new Path('app_backend_editorlego_index'),'icon' => 'gamepad']);
        $return[] = new MenuItem('Genre', ['path' => new Path('lego_index', ['entity'=>'genre']),'icon' => 'gamepad']);
        $return[] = new MenuItem('Thème', ['path' => new Path('lego_index', ['entity'=>'theme']),'icon' => 'gamepad']);
        $return[] = new MenuItem('Durée', ['path' => new Path('lego_index', ['entity'=>'duration']),'icon' => 'gamepad']);
        $return[] = new MenuItem('Commentaire', ['path' => new Path('app_backend_playcommentlego_index'), 'icon'=>'gamepad']);

        $return[] = new MenuItem('Administration', ['type'=>MenuItem::TYPE_HEADER]);
        $return[] = new MenuItem('Utilisateur', ['path' => new Path('lego_index', ['entity'=>'user']), 'icon' => 'users']);

        return $return;
    }


}
