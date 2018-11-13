<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Jeu
 *
 * @ORM\Table(name="duration")
 * @Lego\Entity(title="Durée")
 * @ORM\Entity(repositoryClass="App\Repository\DurationRepository")
 */
class Duration
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
     * @var int
     *
     * @ORM\Column(name="name", type="integer", length=255)
     * @Assert\NotBlank()
     * @Lego\Field(label="Durée en minutes", twig="{{ view.value }} minutes")
     */
    private $duration;





    public function __toString(){
        return (string)$this->duration .' minutes';
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
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }


}
