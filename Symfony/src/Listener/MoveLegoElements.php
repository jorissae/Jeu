<?php

namespace App\Listener;

use Idk\LegoBundle\Events\UpdateOrganizationComponentsEvent;
use Idk\LegoBundle\Events\UpdateOrganizationWidgetsEvent;

class MoveLegoElements{

    public function updateComponents(UpdateOrganizationComponentsEvent $event){
        print_r($event->getOrder());
        die('compoenents'. $event->getRouteSuffix());
    }

    public function updateWidgets(UpdateOrganizationWidgetsEvent $event){
        print_r($event->getOrder());
        die('widget');
    }
}