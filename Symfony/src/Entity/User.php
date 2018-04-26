<?php

namespace App\Entity;

use Idk\LegoBundle\Model\LegoUserModel;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity()
 */
class User extends LegoUserModel
{
}
