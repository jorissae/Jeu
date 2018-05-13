<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Jeu
 *
 * @ORM\Table(name="editor")
 * @Lego\Entity(title="Editeur")
 * @ORM\Entity(repositoryClass="App\Repository\EditorRepository")
 */
class Editor
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
     * @var string
     *
     * @Lego\File(directory="public/uploads/editor")
     * @Lego\Form\FileForm()
     * @Lego\Field(label="Logo", image={"directory":"/uploads/editor","width":"100px"})
     * @ORM\Column(name="logo", type="string")
     */
    private $logo;


    /**
     * @var Play
     *
     * @ORM\OneToMany(targetEntity="Play", mappedBy="editor")
     */
    private $plays;





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
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return Jeu
     */
    public function getPlays()
    {
        return $this->plays;
    }

    /**
     * @param Jeu $plays
     */
    public function setPlays(Play $plays)
    {
        $this->plays = $plays;
    }



}
