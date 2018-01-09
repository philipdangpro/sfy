<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table(name="module")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModuleRepository")
 */
class Module
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Many Modules have Many Trainings.
     * @ORM\ManyToMany(targetEntity="Training", mappedBy="modules")
     */
    private $trainings;

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
     * @return Module
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
     * Constructor
     */
    public function __construct()
    {
        $this->trainings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add training
     *
     * @param \AppBundle\Entity\Training $training
     *
     * @return Module
     */
    public function addTraining(\AppBundle\Entity\Training $training)
    {
        $this->trainings[] = $training;

        return $this;
    }

    /**
     * Remove training
     *
     * @param \AppBundle\Entity\Training $training
     */
    public function removeTraining(\AppBundle\Entity\Training $training)
    {
        $this->trainings->removeElement($training);
    }

    /**
     * Get trainings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrainings()
    {
        return $this->trainings;
    }
}
