<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
use Idk\LegoBundle\Model\LegoTreeModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @Lego\Entity(
 *     config="App\Configurator\CategoryConfigurator",
 *     title="Catégorie",
 *     permissions={"all"="ROLE_USER"})
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category extends LegoTreeModel
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
     * @Lego\Field(label="Libelle", edit_in_place=true, path="show")
     * @Lego\Filter\StringFilter()
     */
    private $libelle;

    /**
     * @return string
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }







    public function __toString(){
        return $this->libelle;
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

}
