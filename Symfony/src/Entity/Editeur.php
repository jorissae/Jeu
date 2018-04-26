<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Jeu
 *
 * @ORM\Table(name="editeur")
 * @ORM\Entity(repositoryClass="App\Repository\EditeurRepository")
 */
class Editeur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Lego\Field
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     * @Lego\Field(label="Nom", edit_in_place=true, path="show")
     * @Lego\Filter\StringFilter()
     */
    private $name;

    /**
     * @var Jeu
     *
     * @ORM\OneToMany(targetEntity="Jeu", mappedBy="editeur")
     */
    private $jeux;




    public function __toString(){
        return $this->name;
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Editeur
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jeux = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add jeux
     *
     * @param \App\Entity\Jeu $jeux
     *
     * @return Editeur
     */
    public function addJeux(\App\Entity\Jeu $jeux)
    {
        $this->jeux[] = $jeux;

        return $this;
    }

    /**
     * Remove jeux
     *
     * @param \App\Entity\Jeu $jeux
     */
    public function removeJeux(\App\Entity\Jeu $jeux)
    {
        $this->jeux->removeElement($jeux);
    }

    /**
     * Get jeux
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJeux()
    {
        return $this->jeux;
    }
}
