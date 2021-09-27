<?php

namespace App\Listener;

use App\Entity\Play;
use Idk\LegoBundle\Events\UpdateOrganizationComponentsEvent;
use Idk\LegoBundle\Events\UpdateOrganizationWidgetsEvent;
use Symfony\Component\EventDispatcher\GenericEvent;

class PrePersistAdd{

    public function prePersistAdd(GenericEvent $event){
        $entity = $event->getSubject()['entity'];
        if($entity instanceof Play){
            if($entity->getNbPlayerMin() && !$entity->getNbPlayerMax()){
                $entity->setNbPlayerMax($entity->getNbPlayerMin());
            }
            if(!$entity->getNbPlayerMin() && $entity->getNbPlayerMax()){
                $entity->setNbPlayerMin($entity->getNbPlayerMax());
            }
            if(!$entity->getNbPlayerAdvisorMin() && !$entity->getNbPlayerAdvisorMax()){
                $entity->setNbPlayerAdvisorMin($entity->getNbPlayerMin());
                $entity->setNbPlayerAdvisorMax($entity->getNbPlayerMax());
            }
            if(!$entity->getNbPlayerAdvisorMin()){
                $entity->setNbPlayerAdvisorMin($entity->getNbPlayerAdvisorMax());
            }
            if(!$entity->getNbPlayerAdvisorMax()){
                $entity->setNbPlayerAdvisorMax($entity->getNbPlayerAdvisorMin());
            }
        }

    }
}