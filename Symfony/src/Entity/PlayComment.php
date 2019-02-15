<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayCommentRepository")
 * @Lego\Entity(config="App\Configurator\PlayCommentConfigurator")
 * @Lego\EntityForm(fields={"player","play","note","message"})
 */
class PlayComment
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Lego\Field(label="Message")
     * @Lego\Form\WysihtmlForm()
     */
    private $message;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Lego\Field(label="Note", twig="{{ view.value }}/4")
     * @Lego\Form\NoteForm(max=4)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Play", inversedBy="playComments")
     * @Lego\Field(label="Jeu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $play;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Player")
     * @Lego\Field(label="Joueur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $player;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
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
}
