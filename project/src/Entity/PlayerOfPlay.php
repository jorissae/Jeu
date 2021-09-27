<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerOfPlayRepository")
 */
class PlayerOfPlay
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Lego\Form\NoteForm(max=4)
     */
    private $note;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Lego\Field(label="Message")
     * @Lego\Form\WysihtmlForm()
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Play", inversedBy="players")
     * @ORM\JoinColumn(nullable=false)
     */
    private $play;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Player", inversedBy="plays")
     * @Lego\Form\EntityForm(class="App\Entity\Player")
     * @ORM\JoinColumn(nullable=false)
     */
    private $player;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getPlay(): ?Play
    {
        return $this->play;
    }

    public function setPlay(?Play $play): self
    {
        $this->play = $play;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): self
    {
        $this->player = $player;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }


}
