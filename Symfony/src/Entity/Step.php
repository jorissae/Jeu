<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Idk\LegoBundle\Annotation\Entity as Lego;
/**
 * Step
 *
 * @ORM\Table(name="step")
 * @Lego\EntityForm(fields={"configurateur", "label", "labelHeader", "labelRecap", "labelNext", "icon"})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\StepRepository")
 */
class Step
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
     * @Lego\Field(label="Label en-tete")
     * @ORM\Column(name="label_header", type="string", nullable=true)
     */
    private $labelHeader;

    /**
     * @var string
     *
     * @Lego\Field(label="Label de récap")
     * @ORM\Column(name="label_recap", type="string", nullable=true)
     */
    private $labelRecap;

    /**
     * @var string
     *
     * @Lego\Field(label="Label bouton suivant")
     * @ORM\Column(name="label_next", type="string", nullable=true)
     */
    private $labelNext;


    /**
     * @var string
     *
     * @Lego\Field(label="Icon", image={"directory":"/api/assets/static/img/icon", "width":"25px"})
     * @ORM\Column(name="icon", type="string", nullable=true)
     */
    private $icon;

    /**
     * @var string
     *
     * @Lego\Field(label="Variables à reset")
     * @ORM\Column(name="reset", type="string", nullable=true)
     */
    private $reset;

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
     * @Lego\Field(label="Final")
     * @ORM\Column(name="final", type="boolean", nullable=true)
     */
    private $final;

    /**
     * @Lego\Field(label="Step")
     * @ORM\ManyToOne(targetEntity="Config", inversedBy="steps")
     * @ORM\JoinColumn(name="configurateur_id", referencedColumnName="id")
     */
    private $configurateur;

    /**
     * @ORM\OneToMany(targetEntity="Variable", mappedBy="step")
     */
    private $variables;


    public function __toString(){
        return $this->getConfigurateur() .' : ' . $this->getLabel();
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
    public function getLabelHeader()
    {
        return $this->labelHeader;
    }

    /**
     * @param string $labelHeader
     */
    public function setLabelHeader($labelHeader)
    {
        $this->labelHeader = $labelHeader;
    }

    /**
     * @return string
     */
    public function getLabelNext()
    {
        return $this->labelNext;
    }

    /**
     * @param string $labelNext
     */
    public function setLabelNext($labelNext)
    {
        $this->labelNext = $labelNext;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
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
    public function getLabelRecap()
    {
        return $this->labelRecap;
    }

    /**
     * @param string $labelRecap
     */
    public function setLabelRecap($labelRecap)
    {
        $this->labelRecap = $labelRecap;
    }

    /**
     * @return mixed
     */
    public function getFinal()
    {
        return $this->final;
    }

    /**
     * @param mixed $final
     */
    public function setFinal($final)
    {
        $this->final = $final;
    }

    /**
     * @return string
     */
    public function getConfigurateur()
    {
        return $this->configurateur;
    }

    /**
     * @param string $configurateur
     */
    public function setConfigurateur($configurateur)
    {
        $this->configurateur = $configurateur;
    }

    /**
     * @return string
     */
    public function getReset()
    {
        return $this->reset;
    }

    /**
     * @param string $reset
     */
    public function setReset($reset)
    {
        $this->reset = $reset;
    }



    /**
     * @return mixed
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param mixed $variables
     */
    public function setVariables($variables)
    {
        $this->variables = $variables;
    }



    public function toArray(){
        $return = [];
        foreach(get_object_vars($this) as $k => $v){
            $return[strtolower(preg_replace('#([A-Z]){1}#', '_$1', $k))] = $v;
        }
        unset($return['variables']);
        unset($return['id']);
        $return['reset'] = ($this->getReset())? explode(',', $this->getReset()): null;
        $return['items'] = [];
        foreach($this->getVariables() as $variable){
            $return['items'][] = $variable->toArray();
        }
        if($this->getConfigurateur() == 'GLOBAL'){
            $return['global_recap'] = true;
            $return['gloabl'] = true;
            $return['last_only'] = true;
            foreach($return['items'] as $k => $item){
                $return['items'][$k]['global'] = true;
            }
        }
        return $return;
    }


}

