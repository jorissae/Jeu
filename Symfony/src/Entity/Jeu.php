<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;

/**
 * Jeu
 *
 * @Lego\Entity(config="App\Configurator\JeuConfigurator")
 * @ORM\Table(name="jeu")
 * @ORM\Entity(repositoryClass="App\Repository\JeuRepository")
 */
class Jeu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Lego\Field(label="Nom")
     * @Lego\Filter\StringFilter()
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlayer", type="integer")
     * @Lego\Field(label="Nombre de joueurs")
     * @Lego\Filter\NumberRangeFilter()
     */
    private $nbPlayer;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     * @Lego\Field(label="Age")
     * @Lego\Filter\NumberRangeFilter()
     */
    private $age;


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
}
