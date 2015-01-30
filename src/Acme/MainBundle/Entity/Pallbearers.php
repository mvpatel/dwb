<?php

namespace Acme\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pallbearers
 *
 * @ORM\Table(name="pallbearers")
 * @ORM\Entity(repositoryClass="Acme\MainBundle\Entity\PallbearersRepository")
 */
class Pallbearers
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
     * @ORM\Column(name="pallbearers_type", type="string", length=255)
     */
    private $pallbearersType;

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
     * Set pallbearersType
     *
     * @param string $pallbearersType
     * @return Pallbearers
     */
    public function setPallbearersType($pallbearersType)
    {
        $this->pallbearersType = $pallbearersType;

        return $this;
    }

    /**
     * Get pallbearersType
     *
     * @return string 
     */
    public function getPallbearersType()
    {
        return $this->pallbearersType;
    }

    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return Pallbearers
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
