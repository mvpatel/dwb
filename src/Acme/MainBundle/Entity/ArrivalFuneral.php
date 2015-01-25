<?php

namespace Acme\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArrivalFuneral
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\MainBundle\Entity\ArrivalFuneralRepository")
 */
class ArrivalFuneral
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
     * @ORM\Column(name="arrival_funeral_type", type="string", length=100)
     */
    private $arrivalFuneralType;

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
     * Set arrivalFuneralType
     *
     * @param string $arrivalFuneralType
     * @return ArrivalFuneral
     */
    public function setArrivalFuneralType($arrivalFuneralType)
    {
        $this->arrivalFuneralType = $arrivalFuneralType;

        return $this;
    }

    /**
     * Get arrivalFuneralType
     *
     * @return string 
     */
    public function getArrivalFuneralType()
    {
        return $this->arrivalFuneralType;
    }

    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return ArrivalFuneral
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
