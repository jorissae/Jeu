<?php

namespace AppBundle\Entity;

use Idk\LegoBundle\Annotation\Entity as Lego;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Article
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProjetRepository")
 */
class Projet
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
     * @ORM\Column(name="data", type="json_array")
     */
    private $data;

    /**
     * @var string
     *
     * @Lego\Field(label="Ip")
     * @ORM\Column(name="ip", type="string", length=20)
     */
    private $ip;

    /**
     * @var string
     *
     * @Lego\Field(label="Code", path="show")
     * @Lego\Filter\StringFilter(label="Code")
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @Lego\Field(label="Date de création")
     * @ORM\Column(name="created_at", type="datetime",nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @Lego\Field(label="Email")
     * @Lego\Filter\StringFilter(label="Email")
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @Lego\Field(label="Nb volets differents")
     * @ORM\Column(name="nb_volet", type="integer")
     */
    private $nbVolet;

    /**
     * @var string
     *
     * @ORM\Column(name="nb_volet_qte", type="integer")
     */
    private $nbVoletWithQte;

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
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getNbVolet()
    {
        return $this->nbVolet;
    }

    /**
     * @param string $nbVolet
     */
    public function setNbVolet($nbVolet)
    {
        $this->nbVolet = $nbVolet;
    }

    /**
     * @return string
     */
    public function getNbVoletWithQte()
    {
        return $this->nbVoletWithQte;
    }

    /**
     * @param string $nbVoletWithQte
     */
    public function setNbVoletWithQte($nbVoletWithQte)
    {
        $this->nbVoletWithQte = $nbVoletWithQte;
    }






}
