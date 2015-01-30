<?php

namespace Acme\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Support
 *
 * @ORM\Table(name="support")
 * @ORM\Entity(repositoryClass="Acme\MainBundle\Entity\SupportRepository")
 */
class Support
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
     * @ORM\Column(name="support_type", type="string", length=255)
     */
    private $supportType;

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
     * Set supportType
     *
     * @param string $supportType
     * @return Support
     */
    public function setSupportType($supportType)
    {
        $this->supportType = $supportType;

        return $this;
    }

    /**
     * Get supportType
     *
     * @return string 
     */
    public function getSupportType()
    {
        return $this->supportType;
    }

    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return Support
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
