<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
use Symfony\Component\Validator\Constraints\NotBlank;
use App\Entity\Collection as PlayCollection;

/**
 * Jeu
 *
 * @Lego\Entity(
 *     config="App\Configurator\PlayConfigurator",
 *     title="Jeu",
 *     permissions={"edit"="ROLE_USER"})
 * @ORM\Table(name="jeu")
 * @ORM\Entity(repositoryClass="App\Repository\PlayRepository")
 * @Lego\EntityExport(fields={"id", "name"})
 */
class Play
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
     * @Lego\Field(label="Nom",path="show", edit_in_place=false, sort=true)
     * @Lego\Filter\StringFilter()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=2, nullable=true)
     * @Lego\Field(label="Position", edit_in_place=true)
     * @Lego\Filter\StringFilter()
     */
    private $position;


    /**
     * @var int
     *
     * @ORM\Column(name="nbPlayerMin", type="integer")
     * @Lego\Field(label="Nombre de joueurs min", edit_in_place=true)
     * //@Lego\Filter\NumberRangeFilter()
     */
    private $nbPlayerMin;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlayerMax", type="integer")
     * @Lego\Field(label="Nombre de joueurs max", edit_in_place=true)
     * //@Lego\Filter\NumberRangeFilter()
     */
    private $nbPlayerMax;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlayerAdvisorMin", type="integer")
     * @Lego\Field(label="Nombre conseillé min")
     * //@Lego\Filter\NumberRangeFilter()
     */
    private $nbPlayerAdvisorMin;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlayerAdvisorMax", type="integer")
     * @Lego\Field(label="Nombre conseillé max")
     * //@Lego\Filter\NumberRangeFilter()
     */
    private $nbPlayerAdvisorMax;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer", nullable=true)
     * //@Lego\Field(label="Note")
     * //@Lego\Form\NoteForm(max=3)
     * @Lego\Filter\NumberRangeFilter()
     */
    private $note;

    /**
     * @var int
     * @Lego\Field(label="Age")
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var Author
     *
     * @ORM\ManyToMany(targetEntity="Category")
     * //@Lego\Form\EntityForm(class="App\Entity\Category", multiple=true)
     * //@Lego\Field(label="Catégorie", edit_in_place=false)
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $categories;

    /**
     * @var Editor
     *
     * @ORM\ManyToOne(targetEntity="Editor")
     * @Lego\Field(label="Editeur",  edit_in_place={"reload":"field"}, path={"route":"app_backend_editorlego_show", "params"={"id":"editor.id"}})
     * @ORM\JoinColumn(name="editeur_id", referencedColumnName="id")
     */
    private $editor;




    /**
     * @var string
     *
     * @Lego\File(directory="public/uploads/play")
     * @Lego\Form\FileForm()
     * @Lego\Field(label="Image", image={"directory":"/uploads/play","width":"100px"})
     * @ORM\Column(name="pictur", type="string", nullable=true)
     */
    private $pictur;

    /**
     * @var string
     *
     * @Lego\File(directory="public/uploads/playlogo")
     * @Lego\Form\FileForm()
     * @Lego\Field(label="Logo", image={"directory":"/uploads/playlogo","width":"80px"})
     * @ORM\Column(name="logo", type="string", nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @Lego\Field(label="Description")
     * @Lego\Form\WysihtmlForm()
     * @ORM\Column(name="description", type="text")
     * @NotBlank()
     */
    private $description;


    /**
     * @var ArrayCollection
     *
     * //@Lego\Field(label="Durées")
     * //@Lego\Form\CollectionForm(entity="App\Entity\LiaisonPlayDuration")
     * //@Lego\Form\ManyToManyJoinForm(entity="App\Entity\LiaisonPlayDuration")
     * @ORM\OneToMany(targetEntity="App\Entity\LiaisonPlayDuration",orphanRemoval=true, mappedBy="play", cascade={"persist","remove"})
     */
    private $durations;

    /**
     * @Lego\Field(label="Genres")
     * @Lego\Form\EntityForm(class="App\Entity\Genre", multiple=true)
     * @ORM\ManyToMany(targetEntity="App\Entity\Genre")
     */
    private $genres;

    /**
     * @Lego\Field(label="Thèmes")
     * //@Lego\Filter\EntityFilter(table="App\Entity\Theme")
     * @Lego\Form\EntityForm(class="App\Entity\Theme", multiple=true)
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme")
     */
    private $themes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Duration")
     * @Lego\Field(label="Durée")
     */
    private $duration;

    /**
     * @Lego\Form\ManyToManyJoinForm(entity="App\Entity\PlayerOfPlay", label="Notes/Joueurs")
     * @ORM\OneToMany(targetEntity="App\Entity\PlayerOfPlay", mappedBy="play", orphanRemoval=true, cascade={"persist","remove"})
     */
    private $players;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlayComment", mappedBy="play")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $playComments;

    /**
     * @Lego\Form\EntityForm(class="App\Entity\Play", label="Nécessite", required=false)
     * @ORM\ManyToOne(targetEntity="App\Entity\Play", inversedBy="extensions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $requirement;

    /**
     * @Lego\Form\EntityForm(class="App\Entity\Play", multiple=true, label="Extensions", required=false, by_reference=false)
     * @ORM\OneToMany(targetEntity="App\Entity\Play", mappedBy="requirement", cascade={"persist"})
     */
    private $extensions;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Collection", inversedBy="plays")
     * @Lego\Field(label="Collections", edit_in_place=false)
     * //@Lego\Filter\EntityFilter(table="App\Entity\Collection")
     * @Lego\Form\EntityForm(class="App\Entity\Collection", multiple=true)
     */
    private $collections;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Lego\Field(label="Video")
     */
    private $video;



    public function __construct()
    {
        $this->durations = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->genres = new ArrayCollection();
        $this->themes = new ArrayCollection();
        $this->players = new ArrayCollection();
        $this->playComments = new ArrayCollection();
        $this->extensions = new ArrayCollection();
        $this->collections = new ArrayCollection();
    }

    public function __toString(){
        return $this->getName();
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
     * Get nbPlayer
     *
     * @return string
     */
    public function getNbPlayer()
    {
        if($this->nbPlayerMin && $this->nbPlayerMax) {
            if($this->nbPlayerMin === $this->nbPlayerMax) return $this->nbPlayerMax;
            return $this->nbPlayerMin . ' - ' . $this->nbPlayerMax;
        }
        return $this->nbPlayerMax ?? $this->nbPlayerMin;
    }

    /**
     * @return string
     */
    public function getNbPlayerAdvisor()
    {
        if($this->nbPlayerAdvisorMin && $this->nbPlayerAdvisorMax) {
            if($this->nbPlayerAdvisorMin === $this->nbPlayerAdvisorMax) return $this->nbPlayerAdvisorMax;
            return $this->nbPlayerAdvisorMin . ' - ' . $this->nbPlayerAdvisorMax;
        }
        return $this->nbPlayerAdvisorMax ?? $this->nbPlayerAdvisorMin;
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
     * @return Editor
     */
    public function getEditor(): ?Editor
    {
        return $this->editor;
    }

    /**
     * @param Editor $editor
     */
    public function setEditor(Editor $editor): void
    {
        $this->editor = $editor;
    }

    /**
     * @return Author
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Author $category
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return int
     */
    public function getPictur()
    {
        return $this->pictur;
    }

    /**
     * @param int $pictur
     */
    public function setPictur($pictur)
    {
        if($pictur) {
            $this->pictur = $pictur;
        }
    }

    /**
     * @return int
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param int $logo
     */
    public function setLogo($logo)
    {
        if($logo) {
            $this->logo = $logo;
        }
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(?string $description)
    {
        $this->description = $description;
    }

    /**
     * @return ArrayCollection
     */
    public function getDurations()
    {
        return $this->durations;
    }

    /**

     * @param ArrayCollection $durations
     */
    public function setDurations($durations): void
    {
        /*foreach($durations as $duration){
            $duration->setPlay($this);
        }*/
        $this->durations = $durations;
    }


    public function addDuration(LiaisonPlayDuration $duration){
        $duration->setPlay($this);
        $this->durations->add($duration);
    }

    public function removeDuration(LiaisonPlayDuration $duration)
    {
        $this->durations->removeElement($duration);
    }

    /**
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param int $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(?string $position)
    {
        $this->position = $position;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenres(): ?Collection
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genres) $this->genres = new ArrayCollection();
        if (!$this->genres->contains($genre)) {
            $this->genres[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        if ($this->genres->contains($genre)) {
            $this->genres->removeElement($genre);
        }

        return $this;
    }

    /**
     * @return Collection|Theme[]
     */
    public function getThemes(): ?Collection
    {
        return $this->themes;
    }

    public function addTheme(Theme $theme): self
    {
        if (!$this->themes) $this->themes = new ArrayCollection();
        if (!$this->themes->contains($theme)) {
            $this->themes[] = $theme;
        }

        return $this;
    }

    public function removeTheme(Theme $theme): self
    {
        if ($this->themes->contains($theme)) {
            $this->themes->removeElement($theme);
        }

        return $this;
    }

    public function getDuration(): ?Duration
    {
        return $this->duration;
    }

    public function setDuration(?Duration $duration): self
    {
        $this->duration = $duration;

        return $this;
    }



    /**
     * @return int
     */
    public function getNbPlayerMin(): ?int
    {
        return $this->nbPlayerMin;
    }

    /**
     * @param int $nbPlayerMin
     */
    public function setNbPlayerMin(?int $nbPlayerMin)
    {
        $this->nbPlayerMin = $nbPlayerMin;
    }

    /**
     * @return int
     */
    public function getNbPlayerMax(): ?int
    {
        return $this->nbPlayerMax;
    }

    /**
     * @param int $nbPlayerMax
     */
    public function setNbPlayerMax(?int $nbPlayerMax)
    {
        $this->nbPlayerMax = $nbPlayerMax;
    }

    /**
     * @return int
     */
    public function getNbPlayerAdvisorMin(): ?int
    {
        return $this->nbPlayerAdvisorMin;
    }

    /**
     * @param int $nbPlayerAdvisorMin
     */
    public function setNbPlayerAdvisorMin(?int $nbPlayerAdvisorMin)
    {
        $this->nbPlayerAdvisorMin = $nbPlayerAdvisorMin;
    }

    /**
     * @return int
     */
    public function getNbPlayerAdvisorMax(): ?int
    {
        return $this->nbPlayerAdvisorMax;
    }

    /**
     * @param int $nbPlayerAdvisorMax
     */
    public function setNbPlayerAdvisorMax(?int $nbPlayerAdvisorMax)
    {
        $this->nbPlayerAdvisorMax = $nbPlayerAdvisorMax;
    }

    /**
     * @return Collection|PlayerOfPlay[]
     */
    public function getPlayers(): ?Collection
    {
        return $this->players;
    }

    public function addPlayer(PlayerOfPlay $player): self
    {
        if(!$this->players) $this->players = new ArrayCollection();
        if (!$this->players->contains($player)) {
            $this->players[] = $player;
            $player->setPlay($this);
        }

        return $this;
    }

    public function removePlayer(PlayerOfPlay $player): self
    {
        if ($this->players->contains($player)) {
            $this->players->removeElement($player);
            // set the owning side to null (unless already changed)
            if ($player->getPlay() === $this) {
                $player->setPlay(null);
            }
        }

        return $this;
    }

    public function getNoteAverage(){
        $note = $i = 0;
        foreach($this->getPlayers() as $players){
            $note+= $players->getNote();
            $i++;
        }if($i === 0){
            return 0;
        }else {
            return $note / $i;
        }
    }

    public function getNoteAverageAll(){
        $note = $i = 0;
        foreach($this->getPlayers() as $players){
            $note+= $players->getNote();
            $i++;
        }
        foreach($this->getPlayComments() as $players){
            $note+= $players->getNote();
            $i++;
        }
        if($i === 0){
            return 0;
        }else {
            return $note / $i;
        }
    }

    /**
     * @return Collection|PlayComment[]
     */
    public function getPlayComments(): Collection
    {
        return $this->playComments;
    }

    public function addPlayComment(PlayComment $playComment): self
    {
        if (!$this->playComments->contains($playComment)) {
            $this->playComments[] = $playComment;
            $playComment->setPlay($this);
        }

        return $this;
    }

    public function removePlayComment(PlayComment $playComment): self
    {
        if ($this->playComments->contains($playComment)) {
            $this->playComments->removeElement($playComment);
            // set the owning side to null (unless already changed)
            if ($playComment->getPlay() === $this) {
                $playComment->setPlay(null);
            }
        }

        return $this;
    }

    public function getRequirement(): ?self
    {
        return $this->requirement;
    }

    public function setRequirement(?self $requirement): self
    {
        $this->requirement = $requirement;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getExtensions(): ?Collection
    {
        return $this->extensions;
    }

    public function addExtension(self $extension): self
    {
        if (!$this->extensions) $this->extensions = new ArrayCollection();
        if (!$this->extensions->contains($extension)) {
            $this->extensions[] = $extension;
            $extension->setRequirement($this);
        }

        return $this;
    }

    public function removeExtension(self $extension): self
    {
        if ($this->extensions->contains($extension)) {
            $this->extensions->removeElement($extension);
            // set the owning side to null (unless already changed)
            if ($extension->getRequirement() === $this) {
                $extension->setRequirement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Collection[]
     */
    public function getCollections(): ?Collection
    {
        return $this->collections;
    }

    public function addCollection(PlayCollection $collection): self
    {
        if ($this->collections && !$this->collections->contains($collection)) {
            $this->collections[] = $collection;
        }

        return $this;
    }

    public function removeCollection(PlayCollection $collection): self
    {
        if ($this->collections->contains($collection)) {
            $this->collections->removeElement($collection);
        }

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
    }













}
