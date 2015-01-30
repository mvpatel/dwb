<?php

namespace Acme\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConnectedUser
 *
 * @ORM\Table(name="connecteduser")
 * @ORM\Entity(repositoryClass="Acme\MainBundle\Entity\ConnectedUserRepository")
 */
class ConnectedUser
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
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;
    
    /**
     * @ORM\OneToOne(targetEntity="Phone")
     * @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     **/
    private $phone;
    
     /**
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     **/
    private $address;
    
    /**
     * @ORM\ManyToOne(targetEntity="ConnectedUserType")
     * @ORM\JoinColumn(name="connected_user_type_id", referencedColumnName="id")
     **/
    private $connectedusertype;
    
    /**
     * @ORM\ManyToOne(targetEntity="Support")
     * @ORM\JoinColumn(name="support_id", referencedColumnName="id")
     **/
    private $support;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=50)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=70)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="access_key", type="string", length=16)
     */
    private $accessKey;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255)
     */
    private $website;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_date", type="date")
     */
    private $modifiedDate;


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
     * Set name
     *
     * @param string $name
     * @return ConnectedUser
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
     * Set surname
     *
     * @param string $surname
     * @return ConnectedUser
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ConnectedUser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set accessKey
     *
     * @param string $accessKey
     * @return ConnectedUser
     */
    public function setAccessKey($accessKey)
    {
        $this->accessKey = $accessKey;

        return $this;
    }

    /**
     * Get accessKey
     *
     * @return string 
     */
    public function getAccessKey()
    {
        return $this->accessKey;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return ConnectedUser
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }


    /**
     * Set modifiedDate
     *
     * @param \DateTime $modifiedDate
     * @return ConnectedUser
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }

    /**
     * Get modifiedDate
     *
     * @return \DateTime 
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * Set user
     *
     * @param \Acme\MainBundle\Entity\User $user
     * @return ConnectedUser
     */
    public function setUser(\Acme\MainBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Acme\MainBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set phone
     *
     * @param \Acme\MainBundle\Entity\Phone $phone
     * @return ConnectedUser
     */
    public function setPhone(\Acme\MainBundle\Entity\Phone $phone = null)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return \Acme\MainBundle\Entity\Phone 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param \Acme\MainBundle\Entity\Address $address
     * @return ConnectedUser
     */
    public function setAddress(\Acme\MainBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Acme\MainBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set connectedusertype
     *
     * @param \Acme\MainBundle\Entity\ConnectedUserType $connectedusertype
     * @return ConnectedUser
     */
    public function setConnectedusertype(\Acme\MainBundle\Entity\ConnectedUserType $connectedusertype = null)
    {
        $this->connectedusertype = $connectedusertype;

        return $this;
    }

    /**
     * Get connectedusertype
     *
     * @return \Acme\MainBundle\Entity\ConnectedUserType 
     */
    public function getConnectedusertype()
    {
        return $this->connectedusertype;
    }

    /**
     * Set support
     *
     * @param \Acme\MainBundle\Entity\Support $support
     * @return ConnectedUser
     */
    public function setSupport(\Acme\MainBundle\Entity\Support $support = null)
    {
        $this->support = $support;

        return $this;
    }

    /**
     * Get support
     *
     * @return \Acme\MainBundle\Entity\Support 
     */
    public function getSupport()
    {
        return $this->support;
    }
}
