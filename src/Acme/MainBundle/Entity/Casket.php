<?php

namespace Acme\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Casket
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\MainBundle\Entity\CasketRepository")
 */
class Casket
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
     * @var string
     *
     * @ORM\Column(name="casket_type", type="string", length=255)
     */
    private $casketType;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_published", type="boolean")
     */
    private $isPublished;


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
     * Set casketType
     *
     * @param string $casketType
     * @return Casket
     */
    public function setCasketType($casketType)
    {
        $this->casketType = $casketType;

        return $this;
    }

    /**
     * Get casketType
     *
     * @return string 
     */
    public function getCasketType()
    {
        return $this->casketType;
    }

    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return Casket
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    /**
     * Get isPublished
     *
     * @return boolean 
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }
}
