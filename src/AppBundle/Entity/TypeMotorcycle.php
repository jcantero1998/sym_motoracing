<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TypeMotorcycle
 *
 * @ORM\Table(name="type_motorcycle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeMotorcycleRepository")
 */
class TypeMotorcycle
{
    /**
    * @ORM\OneToMany(targetEntity="TypeMotorCycle", mappedBy="Motorcycle")
    */
    private $MotorCycle;
    public function __construct()
    {
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


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
     * Set type
     *
     * @param string $type
     *
     * @return TypeMotorcycle
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}

