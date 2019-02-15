<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 * @Lego\Entity(config="App\Configurator\PlayerConfigurator")
 */
class Player
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Lego\Field(label="Prénom", edit_in_place=true, sort=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Lego\Field(label="Nom", edit_in_place=true, sort=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Lego\Field(label="Pseudo", edit_in_place=true, sort=true)
     */
    private $pseudo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlayerOfPlay", mappedBy="player", orphanRemoval=true)
     */
    private $plays;

    public function __construct()
    {
        $this->plays = new ArrayCollection();
    }

    public function __toString(){
        return $this->pseudo;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * @return Collection|PlayerOfPlay[]
     */
    public function getPlays(): Collection
    {
        return $this->plays;
    }

    public function addPlay(PlayerOfPlay $play): self
    {
        if (!$this->plays->contains($play)) {
            $this->plays[] = $play;
            $play->setPlayer($this);
        }

        return $this;
    }

    public function removePlay(PlayerOfPlay $play): self
    {
        if ($this->plays->contains($play)) {
            $this->plays->removeElement($play);
            // set the owning side to null (unless already changed)
            if ($play->getPlayer() === $this) {
                $play->setPlayer(null);
            }
        }

        return $this;
    }
}
