<?php

namespace App\Entity;

use App\Configurator\LiaisonPlayDurationConfigurator;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;

/**
 * Jeu
 *
 * @Lego\Entity(config="App\Configurator\PlayConfigurator",title="Jeu")
 * @ORM\Table(name="jeu")
 * @ORM\Entity(repositoryClass="App\Repository\PlayRepository")
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
     * @ORM\Column(name="age", type="integer")
     * @Lego\Field(label="Age")
     * @Lego\Filter\NumberRangeFilter()
     */
    private $age;

    /**
     * @var Editor
     *
     * @ORM\ManyToOne(targetEntity="Editor")
     * @Lego\Field(label="Editeur",  edit_in_place={"reload":"field"}, path={"route":"app_backend_editorlego_show", "params"={"id":"editor.id"}})
     * @ORM\JoinColumn(name="editeur_id", referencedColumnName="id")
     */
    private $editor;


    /**
     * @var Author
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @Lego\Field(label="Catégorie",  edit_in_place={"reload":"field"}, path={"route":"lego_show", "params"={"id":"category.id","entity":"category"}})
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var string
     *
     * @Lego\File(directory="public/uploads/play")
     * @Lego\Form\FileForm()
     * @Lego\Field(label="Image", image={"directory":"/uploads/play","width":"100px"})
     * @ORM\Column(name="pictur", type="string")
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
     * @ORM\OneToMany(targetEntity="App\Entity\LiaisonPlayDuration", mappedBy="play", cascade={"persist"})
     */
    private $durations;



    public function __construct()
    {
        $this->durations = new ArrayCollection();
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
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Author $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
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
        foreach($durations as $duration){
            $duration->setPlay($this);
        }
        $this->durations = $durations;
    }

    public function addDurations($durations){
        die('ok');
    }

    public function addDuration($durations){
        die('oks');
    }


    public function removeDurations(LiaisonPlayDuration $duration)
    {
        $this->durations->removeElement($duration);
    }








}
