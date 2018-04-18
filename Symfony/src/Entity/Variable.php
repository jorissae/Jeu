<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
/**
 * Variable
 *
 * @Lego\EntityForm(fields={"step","var","label", "intro", "subIntro", "type","html", "aideHtml", "img"})
 * @ORM\Table(name="variable")
 * @ORM\Entity(repositoryClass="App\Entity\VariableRepository")
 */
class Variable
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
     * @Lego\Field(label="Label")
     * @ORM\Column(name="label", type="string", nullable=true)
     */
    private $label;


    /**
     * @var string
     *
     * @Lego\Field(label="Variable")
     * @ORM\Column(name="variable", type="string", nullable=true)
     */
    private $var;

    /**
     * @var string
     *
     * @Lego\Field(label="Choix")
     * @ORM\Column(name="choice", type="integer", nullable=true)
     */
    private $choice;

    /**
     * @var string
     *
     * @Lego\Field(label="Base")
     * @ORM\Column(name="base", type="boolean", nullable=true)
     */
    private $base;

    /**
     * @var string
     *
     * @Lego\Field(label="Introduction")
     * @ORM\Column(name="intro", type="string", nullable=true)
     */
    private $intro;

    /**
     * @var string
     *
     * @Lego\Field(label="Sous Introduction")
     * @ORM\Column(name="sub_intro", type="string", nullable=true)
     */
    private $subIntro;

    /**
     * @var string
     *
     * @Lego\Field(label="Non obligatoire")
     * @ORM\Column(name="no_validate", type="boolean", nullable=true)
     */
    private $noValidate;

    /**
     * @var string
     *
     * @Lego\Field(label="Cacher")
     * @ORM\Column(name="hidden_recap", type="boolean", nullable=true)
     */
    private $hiddenRecap;

    /**
     * @var string
     *
     * @Lego\Field(label="Widget")
     * @ORM\Column(name="widget", type="string", nullable=true)
     */
    private $widget;

    /**
     * @var string
     *
     * @Lego\Field(label="Action")
     * @ORM\Column(name="action", type="string", nullable=true)
     */
    private $action;

    /**
     * @var string
     *
     * @Lego\Field(label="Image", image={"directory":"/api/assets/static/img", "width":"100px"})
     * @ORM\Column(name="image", type="string", nullable=true)
     */
    private $img;

    /**
     * @var string
     *
     * @Lego\Field(label="Aide HTML")
     * @Lego\Form\WysihtmlForm()
     * @ORM\Column(name="aide_html", type="text", nullable=true)
     */
    private $aideHtml;

    /**
     * @var string
     *
     * @Lego\Field(label="HTML")
     * @Lego\Form\WysihtmlForm()
     * @ORM\Column(name="html", type="text", nullable=true)
     */
    private $html;

    /**
     * @var string
     *
     * @Lego\Field(label="Class CSS (bootstrap)")
     * @ORM\Column(name="css_class", type="string", nullable=true)
     */
    private $cssClass;

    /**
     * @var string
     *
     * @Lego\Field(label="Type d'affichage")
     * @ORM\Column(name="type", type="string", nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @Lego\Field(label="En-tete de l'option")
     * @ORM\Column(name="main_option", type="boolean", nullable=true)
     */
    private $mainOption;


    /**
     * @var string
     *
     * @Lego\Field(label="Introduction de l'option")
     * @ORM\Column(name="option_intro", type="string", nullable=true)
     */
    private $optionIntro;

    /**
     * @var string
     *
     * @Lego\Field(label="Nom de l'option")
     * @ORM\Column(name="option_name", type="string", nullable=true)
     */
    private $option;

    /**
     * @var string
     *
     * @Lego\Field(label="Affecte les variables")
     * @ORM\Column(name="vars", type="string", nullable=true)
     */
    private $vars;

    /**
     * @Lego\Field(label="Step")
     * @ORM\ManyToOne(targetEntity="Step", inversedBy="variables")
     * @ORM\JoinColumn(name="step_id", referencedColumnName="id")
     */
    private $step;

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
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getVar()
    {
        return $this->var;
    }

    /**
     * @param string $var
     */
    public function setVar($var)
    {
        $this->var = $var;
    }

    /**
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * @param string $intro
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;
    }

    /**
     * @return string
     */
    public function getNoValidate()
    {
        return $this->noValidate;
    }

    /**
     * @param string $noValidate
     */
    public function setNoValidate($noValidate)
    {
        $this->noValidate = $noValidate;
    }

    /**
     * @return string
     */
    public function getHiddenRecap()
    {
        return $this->hiddenRecap;
    }

    /**
     * @param string $hiddenRecap
     */
    public function setHiddenRecap($hiddenRecap)
    {
        $this->hiddenRecap = $hiddenRecap;
    }

    /**
     * @return string
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * @param string $widget
     */
    public function setWidget($widget)
    {
        $this->widget = $widget;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getMainOption()
    {
        return $this->mainOption;
    }

    /**
     * @param string $mainOption
     */
    public function setMainOption($mainOption)
    {
        $this->mainOption = $mainOption;
    }

    /**
     * @return string
     */
    public function getOptionIntro()
    {
        return $this->optionIntro;
    }

    /**
     * @param string $optionIntro
     */
    public function setOptionIntro($optionIntro)
    {
        $this->optionIntro = $optionIntro;
    }

    /**
     * @return string
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param string $option
     */
    public function setOption($option)
    {
        $this->option = $option;
    }

    /**
     * @return mixed
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param mixed $step
     */
    public function setStep($step)
    {
        $this->step = $step;
    }

    /**
     * @return string
     */
    public function getChoice()
    {
        return $this->choice;
    }

    /**
     * @param string $choice
     */
    public function setChoice($choice)
    {
        $this->choice = $choice;
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
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param string $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }

    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getSubIntro()
    {
        return $this->subIntro;
    }

    /**
     * @param string $subIntro
     */
    public function setSubIntro($subIntro)
    {
        $this->subIntro = $subIntro;
    }

    /**
     * @return string
     */
    public function getAideHtml()
    {
        return $this->aideHtml;
    }

    /**
     * @param string $aideHtml
     */
    public function setAideHtml($aideHtml)
    {
        $this->aideHtml = $aideHtml;
    }

    /**
     * @return mixed
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * @param mixed $vars
     */
    public function setVars($vars)
    {
        $this->vars = $vars;
    }


    public function toArray(){
        $return = [];
        foreach(get_object_vars($this) as $k => $v){
            $return[strtolower(preg_replace('#([A-Z]){1}#', '_$1', $k))] = $v;
        }
        unset($return['variables']);
        unset($return['id']);
        $return['widget'] = [
            'id'=>$this->getWidget(),
            'base'=>$this->getBase(),
            'choice'=>$this->getChoice(),
            'class'=>$this->getCssClass(),
            'subclass'=>$this->getType(),
            'main_option' => $this->getMainOption(),
            'option' => $this->getOption(),
            'option_intro' => $this->getOptionIntro(),
            'vars'=>($this->getVars())? explode(',' , $this->getVars()):null];
        if($this->getAideHtml()){
            $return['aide'] = ['html'=>$this->getAideHtml()];
        }
        unset($return['base']);
        unset($return['cssClass']);
        unset($return['choice']);
        unset($return['subclass']);
        unset($return['aideHtml']);
        unset($return['step']);
        unset($return['vars']);
        unset($return['main_option']);
        unset($return['option']);
        unset($return['option_intro']);
        return $return;
    }



}

