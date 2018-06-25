<?php

namespace App\Entity;

use App\Configurator\LiaisonPlayDurationConfigurator;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;

/**
 * Jeu
 *
 * @Lego\Entity(
 *     config="App\Configurator\PlayConfigurator",
 *     title="Jeu",
 *     permissions={"show"="ROLE_USER"})
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
     * @ORM\Column(name="note", type="integer")
     * @Lego\Field(label="Note")
     * @Lego\Form\NoteForm()
     * @Lego\Filter\NumberRangeFilter()
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     * @Lego\Field(label="Age", sort=true)
     * @Lego\Filter\NumberRangeFilter()
     */
    private $age;

    /**
     * @var Author
     *
     * @ORM\ManyToMany(targetEntity="Category")
     * @Lego\Form\EntityForm(class="App\Entity\Category", multiple=true)
     * @Lego\Field(label="Catégorie", edit_in_place=false)
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
     * @Lego\Field(label="Description")
     * @ORM\Column(name="description", type="string")
     */
    private $description;

    /**
     * @var ArrayCollection
     *
     * @Lego\Field(label="Durées")
     * //@Lego\Form\CollectionForm(entity="App\Entity\LiaisonPlayDuration")
     * @Lego\Form\ManyToManyJoinForm(entity="App\Entity\LiaisonPlayDuration")
     * @ORM\OneToMany(targetEntity="App\Entity\LiaisonPlayDuration",orphanRemoval=true, mappedBy="play", cascade={"persist","remove"})
     */
    private $durations;



    public function __construct()
    {
        $this->durations = new ArrayCollection();
        $this->categories = new ArrayCollection();
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
        $this->pictur = $pictur;
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
    public function setDescription(string $description)
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










}
