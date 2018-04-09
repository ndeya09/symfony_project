<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix", type="decimal", precision=10, scale=2)
     */
    private $prix;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="prDate", type="datetime")
     */
    private $prDate;

    /**
    * @var boolean
    *
    * @ORM\Column(name="prsolde", type="boolean")
    */
    private $prsolde = true;


    /**
     * Get id
     *
     * @return int
     */
    public function __construct(){
        //date de creation automatiquement affecté lorsque le produit est cré
        $this->prDate = new \datetime("now");
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Produit
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
     * Set prix
     *
     * @param string $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set prDate
     *
     * @param \DateTime $prDate
     *
     * @return Produit
     */
    public function setPrDate($prDate)
    {
        $this->prDate = $prDate;

        return $this;
    }

    /**
     * Get prDate
     *
     * @return \DateTime
     */
    public function getPrDate()
    {
        return $this->prDate;
    }
    /**
     * Get prsolde
     *
     * @return \boolean
     */
    public function getPrSolde()
    {
        return $this->prsolde;
    }
}

