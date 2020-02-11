<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Buyer
 *
 * @ORM\Table(name="buyer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BuyerRepository")
 */
class Buyer
{
    /**
    * @ORM\OneToMany(targetEntity="Buyer", mappedBy="Motorcycle")
    */
    private $MotorCycle;
    public function __construct()
    {
    $this->MotorCycle = new ArrayCollection();
    }
    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="Buyer")
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

