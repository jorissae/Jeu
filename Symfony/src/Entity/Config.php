<?php

namespace AppBundle\Entity;

use Idk\LegoBundle\Annotation\Entity as Lego;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="config")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ConfigRepository")
 */
class Config
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @Lego\Form\GeoJsonForm()
     * @Lego\Field(label="Nom")
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @Lego\Field(label="Afficher message tranche")
     * @ORM\Column(name="show_message_tranche", type="boolean", nullable=true)
     */
    private $showMessageTranchee;

    /**
     * @var string
     *
     * @Lego\Form\DateForm()
     * @Lego\Field(label="Test D")
     * @ORM\Column(name="test", type="datetime", nullable=true)
     */
    private $testt;

    /**
     * @var string
     *
     * @Lego\Form\DateTimeForm()
     * @Lego\Field(label="Test DT")
     * @ORM\Column(name="test2", type="time", nullable=true)
     */
    private $testtt;

    /**
     * @var string
     *
     * @Lego\Form\TimeForm()
     * @Lego\Field(label="Test T")
     * @ORM\Column(name="test3", type="date", nullable=true)
     */
    private $testttt;

    /**
     * @var string
     *
     * @Lego\Form\NumberForm()
     * @Lego\Field(label="Test I")
     * @ORM\Column(name="test4", type="integer", nullable=true)
     */
    private $testttttt;

    /**
     * @var string
     *
     * @Lego\Field(label="Variable de prix de base")
     * @ORM\Column(name="var_price_base", type="string", nullable=true)
     */
    private $varPriceBase;

    /**
     * @var string
     *
     * @Lego\Field(label="Nom de choix")
     * @ORM\Column(name="choice_name", type="string", nullable=true)
     */
    private $choiceName;

    /**
     * @var string
     *
     * @Lego\Field(label="Image", image={"directory":"/api/assets", "width":"100px"})
     * @ORM\Column(name="base_visuel", type="string", nullable=true)
     */
    private $baseVisuel;

    /**
     * @var string
     *
     * @Lego\Field(label="Nom par defaut du produit")
     * @ORM\Column(name="default_name_elm", type="string", nullable=true)
     */
    private $defaultNameElm;

    /**
     * @var string
     *
     * @Lego\Field(label="Sous nom du produit")
     * @ORM\Column(name="sub_name_elm", type="string", nullable=true)
     */
    private $subNameElm;


    /**
     * @var string
     *
     * @Lego\Field(label="Class css")
     * @ORM\Column(name="css_class", type="string", nullable=true)
     */
    private $cssClass;

    /**
     * @var string
     *
     * @Lego\Form\JsonForm()
     * @Lego\Field(label="Base JSON du produit")
     * @ORM\Column(name="base", type="json_array")
     */
    private $base;

    /**
     * @ORM\OneToMany(targetEntity="Step", mappedBy="configurateur")
     */
    private $steps;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getShowMessageTranchee()
    {
        return $this->showMessageTranchee;
    }

    /**
     * @param string $showMessageTranchee
     */
    public function setShowMessageTranchee($showMessageTranchee)
    {
        $this->showMessageTranchee = $showMessageTranchee;
    }

    /**
     * @return string
     */
    public function getVarPriceBase()
    {
        return $this->varPriceBase;
    }

    /**
     * @param string $varPriceBase
     */
    public function setVarPriceBase($varPriceBase)
    {
        $this->varPriceBase = $varPriceBase;
    }

    /**
     * @return string
     */
    public function getChoiceName()
    {
        return $this->choiceName;
    }

    /**
     * @param string $choiceName
     */
    public function setChoiceName($choiceName)
    {
        $this->choiceName = $choiceName;
    }

    /**
     * @return string
     */
    public function getBaseVisuel()
    {
        return $this->baseVisuel;
    }

    /**
     * @param string $baseVisuel
     */
    public function setBaseVisuel($baseVisuel)
    {
        $this->baseVisuel = $baseVisuel;
    }

    /**
     * @return string
     */
    public function getDefaultNameElm()
    {
        return $this->defaultNameElm;
    }

    /**
     * @param string $defaultNameElm
     */
    public function setDefaultNameElm($defaultNameElm)
    {
        $this->defaultNameElm = $defaultNameElm;
    }

    /**
     * @return string
     */
    public function getSubNameElm()
    {
        return $this->subNameElm;
    }

    /**
     * @param string $subNameElm
     */
    public function setSubNameElm($subNameElm)
    {
        $this->subNameElm = $subNameElm;
    }

    /**
     * @return string
     */
    public function getCssClass()
    {
        return $this->cssClass;
    }

    /**
     * @param string $cssClass
     */
    public function setCssClass($cssClass)
    {
        $this->cssClass = $cssClass;
    }

    /**
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param string $base
     */
    public function setBase($base)
    {
        $this->base = $base;
    }

    /**
     * @return mixed
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * @param mixed $steps
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;
    }



    public function toArray(){
        $return = [];
        foreach(get_object_vars($this) as $k => $v){
            $return[strtolower(preg_replace('#([A-Z]){1}#', '_$1', $k))] = $v;
        }
        unset($return['steps']);
        unset($return['id']);
        $return['class'] = $this->getCssClass();
        unset($return['cssClass']);
        return $return;
    }

    /**
     * @return string
     */
    public function getTestt()
    {
        return $this->testt;
    }

    /**
     * @param string $testt
     */
    public function setTestt($testt)
    {
        $this->testt = $testt;
    }

    /**
     * @return string
     */
    public function getTesttt()
    {
        return $this->testtt;
    }

    /**
     * @param string $testtt
     */
    public function setTesttt($testtt)
    {
        $this->testtt = $testtt;
    }

    /**
     * @return string
     */
    public function getTestttt()
    {
        return $this->testttt;
    }

    /**
     * @param string $testttt
     */
    public function setTestttt($testttt)
    {
        $this->testttt = $testttt;
    }

    /**
     * @return string
     */
    public function getTestttttt()
    {
        return $this->testttttt;
    }

    /**
     * @param string $testttttt
     */
    public function setTestttttt($testttttt)
    {
        $this->testttttt = $testttttt;
    }












}
