<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;

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
     * @Lego\Field(label="Nom",path="show", edit_in_place=true)
     * @Lego\Filter\StringFilter()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=2)
     * @Lego\Field(label="Position")
     * @Lego\Filter\StringFilter()
     */
    private $position;

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
     * @ORM\Column(name="nbPlayerAdvisor", type="integer")
     * @Lego\Field(label="Nombre de joueurs conseillés")
     * @Lego\Filter\NumberRangeFilter()
     */
    private $nbPlayerAdvisor;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer", nullable=true)
     * @Lego\Field(label="Note")
     * @Lego\Form\NoteForm(max=3)
     * @Lego\Filter\NumberRangeFilter()
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     * @Lego\Field(label="Âge", sort=true)
     * @Lego\Filter\NumberRangeFilter()
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
     * @Lego\Form\EntityForm(class="App\Entity\Theme", multiple=true)
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme")
     */
    private $themes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Duration")
     * @Lego\Field(label="Durée")
     */
    private $duration;



    public function __construct()
    {
        $this->durations = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->genres = new ArrayCollection();
        $this->themes = new ArrayCollection();
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
    public function setPosition(string $position)
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
    public function getNbPlayerAdvisor(): ?int
    {
        return $this->nbPlayerAdvisor;
    }

    /**
     * @param int $nbPlayerAdvisor
     */
    public function setNbPlayerAdvisor(int $nbPlayerAdvisor)
    {
        $this->nbPlayerAdvisor = $nbPlayerAdvisor;
    }










}
