<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Jeu
 *
 * @ORM\Table(name="author")
 * @Lego\Entity(title="Auteur")
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
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

}
