<?php

namespace App\Listener;

use Idk\LegoBundle\Events\UpdateOrganizationComponentsEvent;

class MoveComponents{

    public function update(UpdateOrganizationComponentsEvent $event){
        print_r($event->getOrder());
        die($event->getRouteSuffix());
    }
}