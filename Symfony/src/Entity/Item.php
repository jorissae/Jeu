<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Idk\LegoBundle\Annotation\Entity as Lego;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @Lego\EntityExport(fields={"var","code","libelle", "sublibelle","aide", "color", "vignette", "condition","visuel","prix","prix2", "url"})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ItemRepository")
 */
class Item
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
     *
     * @ORM\Column(name="circonstance", type="string", nullable=true)
     */
    private $condition;

    /**
     *
     * @ORM\Column(name="visuel", type="string", nullable=true)
     */
    private $visuel;

    /**
     * @var string
     *
     * @ORM\Column(name="vignette", type="string", nullable=true)
     */
    private $vignette;

    /**
     * @var string
     *
     * @Lego\Field(label="Couleur")
     * @ORM\Column(name="color", type="string", nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @Lego\Field(label="Url fiche produit")
     * @ORM\Column(name="url", type="string", nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", nullable=true)
     * @Lego\Field(label="Libelle", edit_in_place=true, path="show")
     * @Lego\Filter\StringFilter(label="Libelle")
     */
    private $libelle;

    /**
     * @var string
     *
     * @Lego\Field(label="Variable")
     * @ORM\Column(name="variable", type="string", length=255)
     */
    private $var;

    /**
     * @var string
     *
     * @Lego\Field(label="Tranche de prix 1")
     * @ORM\Column(name="prix", type="float", nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @Lego\Field(label="Tranche de prix 2")
     * @ORM\Column(name="prix2", type="float", nullable=true)
     */
    private $prix2;

    /**
     * @var string
     *
     * @Lego\Field(label="Sous libelle")
     * @ORM\Column(name="sub_libelle", type="string", nullable=true)
     */
    private $subLibelle;

    /**
     * @var string
     *
     * @Lego\Field(label="Code", edit_in_place=true)
     * @ORM\Column(name="code", type="string")
     */
    private $code;

    /**
     * @var string
     *
     * @Lego\Field(label="Aide")
     * @ORM\Column(name="aide", type="text", nullable=true)
     */
    private $aide;








    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set condition
     *
     * @param string $condition
     *
     * @return Item
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Get condition
     *
     * @return string
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * Set visuel
     *
     * @param string $visuel
     *
     * @return Item
     */
    public function setVisuel($visuel)
    {
        $this->visuel = $visuel;

        return $this;
    }

    /**
     * Get visuel
     *
     * @return string
     */
    public function getVisuel()
    {
        return $this->visuel;
    }

    /**
     * Set vignette
     *
     * @param string $vignette
     *
     * @return Item
     */
    public function setVignette($vignette)
    {
        $this->vignette = $vignette;

        return $this;
    }

    /**
     * Get vignette
     *
     * @return string
     */
    public function getVignette()
    {
        return $this->vignette;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Item
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set libelle
     *
     * @param \libelle $libelle
     *
     * @return Item
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return \libelle
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Item
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set var
     *
     * @param string $var
     *
     * @return Item
     */
    public function setVar($var)
    {
        $this->var = $var;

        return $this;
    }

    /**
     * Get var
     *
     * @return string
     */
    public function getVar()
    {
        return $this->var;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Item
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @return string
     */
    public function getPrix2()
    {
        return $this->prix2;
    }

    /**
     * @param string $prix2
     */
    public function setPrix2($prix2)
    {
        $this->prix2 = $prix2;
    }


    /**
     * Set subLibelle
     *
     * @param string $subLibelle
     *
     * @return Item
     */
    public function setSubLibelle($subLibelle)
    {
        $this->subLibelle = $subLibelle;

        return $this;
    }

    /**
     * Get subLibelle
     *
     * @return string
     */
    public function getSubLibelle()
    {
        return $this->subLibelle;
    }

    /**
     * Set aide
     *
     * @param string $aide
     *
     * @return Item
     */
    public function setAide($aide)
    {
        $this->aide = $aide;

        return $this;
    }

    /**
     * Get aide
     *
     * @return string
     */
    public function getAide()
    {
        return $this->aide;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getDefaultQte(){
        if(in_array($this->getVar(), ['domotique','domotique2'])){
            return 0;
        }else{
            return 1;
        }
    }




    public function toArray(){
        $return = get_object_vars($this);
        $return['cprix'] = $this->getPrix();
        $return['qte'] = $this->getDefaultQte();
        unset($return['id']);
        return $return;
    }

    public function fromArray(array $data){
        foreach($data as $key => $value){
            if(isset($this->$key)){
                $this->$key = $value;
            }
        }
        return $this;
    }
}
