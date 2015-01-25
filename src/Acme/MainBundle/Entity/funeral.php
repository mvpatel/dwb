<?php

namespace Acme\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * funeral
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\MainBundle\Entity\funeralRepository")
 */
class funeral
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
     * @ORM\Column(name="funeral_type", type="string", length=100)
     */
    private $funeralType;

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
     * Set funeralType
     *
     * @param string $funeralType
     * @return funeral
     */
    public function setFuneralType($funeralType)
    {
        $this->funeralType = $funeralType;

        return $this;
    }

    /**
     * Get funeralType
     *
     * @return string 
     */
    public function getFuneralType()
    {
        return $this->funeralType;
    }

    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return funeral
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
