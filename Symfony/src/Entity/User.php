<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Idk\LegoBundle\Model\LegoUserModel;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;

/**
 *
 * @Lego\Entity(
 *     config="App\Configurator\UserConfigurator",
 *     title="User")
 * @ORM\Entity()
 */
class User extends LegoUserModel
{
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Collection", mappedBy="user")
     */
    private $collections;

    public function __construct()
    {
        parent::__construct();
        $this->collections = new ArrayCollection();
    }

    function __toString()
    {
        return $this->getUsername();
    }

    /**
     * @return Collection|Collection[]
     */
    public function getCollections(): Collection
    {
        return $this->collections;
    }

    public function addCollection(Collection $collection): self
    {
        if (!$this->collections->contains($collection)) {
            $this->collections[] = $collection;
            $collection->setUser($this);
        }

        return $this;
    }

    public function removeCollection(Collection $collection): self
    {
        if ($this->collections->contains($collection)) {
            $this->collections->removeElement($collection);
            // set the owning side to null (unless already changed)
            if ($collection->getUser() === $this) {
                $collection->setUser(null);
            }
        }

        return $this;
    }
}
