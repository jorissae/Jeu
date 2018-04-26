<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Jeu
 *
 * @ORM\Table(name="jeu2")
 * @ORM\Entity(repositoryClass="App\Repository\Jeu2Repository")
 * @Lego\EntityForm(fields={"name","nbPlayer","age","image","editeur","createdAt"})
 * @Lego\EntityExport(fields={"name"})
 * @Lego\Entity(name="jeu2")
 */
class Jeu2
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Lego\Field(label="Id", path="show", twig="jeu_{{ view.value }}")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     * @Lego\Field(label="Nom", edit_in_place=true, path={"route":"app_jeulego_show", "params"={"id":"id"}})
     * @Lego\Filter\StringFilter()
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlayer", type="integer")
     * @Assert\NotBlank()
     * @Lego\Field(label="Nombre de joueurs")
     * @Lego\Filter\NumberRangeFilter()
     */
    private $nbPlayer;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     * @Assert\NotBlank()
     * @Lego\Field(label="Age")
     * @Lego\Filter\NumberRangeFilter()
     */
    private $age;

    /**
     * @var int
     *
     * @Lego\File(directory="public/uploads/jeu")
     * @Lego\Form\FileForm()
     * @Lego\Field(label="Image", image={"directory":"/uploads/jeu","width":"50px"})
     * @ORM\Column(name="image", type="string")
     */
    private $image;

    /**
     * @var int
     *
     * @Lego\Field(label="Date de création")
     * @Lego\Form\DateForm()
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var Editeur
     *
     * @ORM\ManyToOne(targetEntity="Editeur")
     * @Lego\Field(label="Editeur",  path={"route":"app_editeurlego_show", "params"={"id":"editeur.id"}})
     * @ORM\JoinColumn(name="editeur_id", referencedColumnName="id")
     */
    private $editeur;


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
     * @return Jeu
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
     * Set nbPlayer
     *
     * @param integer $nbPlayer
     *
     * @return Jeu
     */
    public function setNbPlayer($nbPlayer)
    {
        $this->nbPlayer = $nbPlayer;

        return $this;
    }

    /**
     * Get nbPlayer
     *
     * @return int
     */
    public function getNbPlayer()
    {
        return $this->nbPlayer;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Jeu
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }



    /**
     * Set editeur
     *
     * @param \App\Entity\Editeur $editeur
     *
     * @return Jeu
     */
    public function setEditeur(\App\Entity\Editeur $editeur = null)
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * Get editeur
     *
     * @return \App\Entity\Editeur
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    /**
     * @return int
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param int $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }




}
