<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Seller
 *
 * @ORM\Table(name="seller")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SellerRepository")
 */
class Seller
{
    
    /**
    * @ORM\OneToMany(targetEntity="Seller", mappedBy="Motorcycle")
    */
    private $MotorCycle;
    public function __construct()
    {
    $this->MotorCycle = new ArrayCollection();
    }
    
    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="Seller")
    * @ORM\JoinColumn(name="User_id", referencedColumnName="id")
    */
    private $User;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

