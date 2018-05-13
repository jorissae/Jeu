<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * LiaisonPlayDuration
 *
 * @ORM\Table(name="join_play_duration")
 * @ORM\Entity()
 */
class LiaisonPlayDuration
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
     * @var Duration
     *
     * @ORM\ManyToOne(targetEntity="Duration")
     * @ORM\JoinColumn(name="duration_id", referencedColumnName="id")
     * @Lego\Field(label="Durée")
     */
    private $duration;

    /**
     * @var Play
     *
     * @ORM\ManyToOne(targetEntity="Play", cascade={"persist"})
     * @ORM\JoinColumn(name="play_id", referencedColumnName="id")
     */
    private $play;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_player", type="integer")
     * @Lego\Field(label="Nombre de joueur")
     */
    private $nbPlayer;


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
     * @return Duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param Author $duration
     */
    public function setDuration(Duration $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return Play
     */
    public function getPlay(): Play
    {
        return $this->play;
    }

    /**
     * @param Play $play
     */
    public function setPlay(Play $play): void
    {
        $this->play = $play;
    }

    /**
     * @return int
     */
    public function getNbPlayer()
    {
        return $this->nbPlayer;
    }

    /**
     * @param int $nbPlayer
     */
    public function setNbPlayer(int $nbPlayer): void
    {
        $this->nbPlayer = $nbPlayer;
    }




}
