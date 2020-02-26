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
class Buyer extends User
{
    /**
    * @ORM\OneToMany(targetEntity="Buyer", mappedBy="Buyer")
    */
    private $MotorCycle;
    //Cambiar propiedades a minusculas--------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->MotorCycle = new ArrayCollection();
    }
    
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

