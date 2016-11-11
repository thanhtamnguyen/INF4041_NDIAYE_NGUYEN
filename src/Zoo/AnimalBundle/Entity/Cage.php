<?php

namespace Zoo\AnimalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cage
 *
 * @ORM\Table(name="cage")
 * @ORM\Entity(repositoryClass="Zoo\AnimalBundle\Repository\CageRepository")
 */
class Cage
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
     * @var int
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="climate", type="string", length=255)
     */
    private $climate;

    /**
     * @var string
     *
     * @ORM\Column(name="current_animal", type="string", length=255)
     */
    private $currentAnimal;


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
     * Set capacity
     *
     * @param integer $capacity
     * @return Cage
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set climate
     *
     * @param string $climate
     * @return Cage
     */
    public function setClimate($climate)
    {
        $this->climate = $climate;

        return $this;
    }

    /**
     * Get climate
     *
     * @return string 
     */
    public function getClimate()
    {
        return $this->climate;
    }

    /**
     * Set currentAnimal
     *
     * @param string $currentAnimal
     * @return Cage
     */
    public function setCurrentAnimal($currentAnimal)
    {
        $this->currentAnimal = $currentAnimal;

        return $this;
    }

    /**
     * Get currentAnimal
     *
     * @return string 
     */
    public function getCurrentAnimal()
    {
        return $this->currentAnimal;
    }
}
