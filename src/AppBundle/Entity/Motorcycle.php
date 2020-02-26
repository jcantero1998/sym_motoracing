<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motorcycle
 *
 * @ORM\Table(name="motorcycle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MotorcycleRepository")
 */
class Motorcycle
{    
    /**
    * @ORM\ManyToOne(targetEntity="Buyer", inversedBy="Motorcycle")
    * @ORM\JoinColumn(name="Buyer_id", referencedColumnName="id")
    */
    private $Buyer;
    
    /**
    * @ORM\ManyToOne(targetEntity="TypeMotorcycle", inversedBy="Motorcycle")
    * @ORM\JoinColumn(name="TypeMotorcycle_id", referencedColumnName="id")
    */
    private $TypeMotorcycle;

    /**
    * @ORM\ManyToOne(targetEntity="Seller", inversedBy="Motorcycle")
    * @ORM\JoinColumn(name="Seller_id", referencedColumnName="id")
    */
    private $Seller;
    
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
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="cc", type="string", length=255)
     */
    private $cc;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;


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
     * @return Motorcycle
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
     * Set color
     *
     * @param string $color
     *
     * @return Motorcycle
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
     * Set cc
     *
     * @param string $cc
     *
     * @return Motorcycle
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * Get cc
     *
     * @return string
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Motorcycle
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Motorcycle
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Motorcycle
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    
    function getBuyer() {
        return $this->Buyer;
    }

    function setBuyer($Buyer) {
        $this->Buyer = $Buyer;
    }

    function getTypeMotorcycle() {
        return $this->TypeMotorcycle;
    }

    function setTypeMotorcycle($TypeMotorcycle) {
        $this->TypeMotorcycle = $TypeMotorcycle;
    }

    function getSeller() {
        return $this->Seller;
    }

    function setSeller($Seller) {
        $this->Seller = $Seller;
    }


}

