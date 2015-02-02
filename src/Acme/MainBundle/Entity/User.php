<?php

namespace Acme\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Acme\MainBundle\Entity\UserRepository")
 */
class User implements UserInterface, \Serializable {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Phone", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     * */
    private $phone;

    /**
     * @ORM\OneToOne(targetEntity="Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     * */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity="funeral")
     * @ORM\JoinColumn(name="funeral_id", referencedColumnName="id")
     * */
    private $funeral;

    /**
     * @ORM\ManyToOne(targetEntity="ArrivalFuneral")
     * @ORM\JoinColumn(name="arrival_funeral_id", referencedColumnName="id")
     * */
    private $arrivalFuneral;

    /**
     * @ORM\ManyToOne(targetEntity="Pallbearers")
     * @ORM\JoinColumn(name="pallbearers_id", referencedColumnName="id")
     * */
    private $pallbearers;

    /**
     * @ORM\ManyToOne(targetEntity="Casket")
     * @ORM\JoinColumn(name="casket_id", referencedColumnName="id")
     * */
    private $casket;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="middle_name", type="string", length=50)
     */
    private $middleName;

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
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date")
     */
    private $dob;

    /**
     * @var string
     *
     * @ORM\Column(name="birth_place", type="string", length=100)
     */
    private $birthPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="favourite_city", type="string", length=50)
     */
    private $favouriteCity;

    /**
     * @var string
     *
     * @ORM\Column(name="guest_service", type="text")
     */
    private $guestService;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_date", type="date")
     */
    private $modifiedDate;

    public function __construct() {
        $this->isActive = true;
        $this->guestService = 'guest_service';
    }

    public function __toString() {
        return strval($this->id);
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return User
     */
    public function setMiddleName($middleName) {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName() {
        return $this->middleName;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname) {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     * @return User
     */
    public function setDob($dob) {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime 
     */
    public function getDob() {
        return $this->dob;
    }

    /**
     * Set birthPlace
     *
     * @param string $birthPlace
     * @return User
     */
    public function setBirthPlace($birthPlace) {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    /**
     * Get birthPlace
     *
     * @return string 
     */
    public function getBirthPlace() {
        return $this->birthPlace;
    }

    /**
     * Set favouriteCity
     *
     * @param string $favouriteCity
     * @return User
     */
    public function setFavouriteCity($favouriteCity) {
        $this->favouriteCity = $favouriteCity;

        return $this;
    }

    /**
     * Get favouriteCity
     *
     * @return string 
     */
    public function getFavouriteCity() {
        return $this->favouriteCity;
    }

    /**
     * Set guestService
     *
     * @param string $guestService
     * @return User
     */
    public function setGuestService($guestService) {
        $this->guestService = $guestService;

        return $this;
    }

    /**
     * Get guestService
     *
     * @return string 
     */
    public function getGuestService() {
        return $this->guestService;
    }

    /**
     * Set phone
     *
     * @param \Acme\MainBundle\Entity\Phone $phone
     * @return User
     */
    public function setPhone(\Acme\MainBundle\Entity\Phone $phone = null) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return \Acme\MainBundle\Entity\Phone 
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set modifiedDate
     *
     * @param \DateTime $modifiedDate
     * @return User
     */
    public function setModifiedDate($modifiedDate) {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }

    /**
     * Get modifiedDate
     *
     * @return \DateTime 
     */
    public function getModifiedDate() {
        return $this->modifiedDate;
    }

    /**
     * Set address
     *
     * @param \Acme\MainBundle\Entity\Address $address
     * @return User
     */
    public function setAddress(\Acme\MainBundle\Entity\Address $address = null) {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Acme\MainBundle\Entity\Address 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set funeral
     *
     * @param \Acme\MainBundle\Entity\funeral $funeral
     * @return User
     */
    public function setFuneral(\Acme\MainBundle\Entity\funeral $funeral = null) {
        $this->funeral = $funeral;

        return $this;
    }

    /**
     * Get funeral
     *
     * @return \Acme\MainBundle\Entity\funeral 
     */
    public function getFuneral() {
        return $this->funeral;
    }

    /**
     * Set arrivalFuneral
     *
     * @param \Acme\MainBundle\Entity\ArrivalFuneral $arrivalFuneral
     * @return User
     */
    public function setArrivalFuneral(\Acme\MainBundle\Entity\ArrivalFuneral $arrivalFuneral = null) {
        $this->arrivalFuneral = $arrivalFuneral;

        return $this;
    }

    /**
     * Get arrivalFuneral
     *
     * @return \Acme\MainBundle\Entity\ArrivalFuneral 
     */
    public function getArrivalFuneral() {
        return $this->arrivalFuneral;
    }

    /**
     * Set pallbearers
     *
     * @param \Acme\MainBundle\Entity\Pallbearers $pallbearers
     * @return User
     */
    public function setPallbearers(\Acme\MainBundle\Entity\Pallbearers $pallbearers = null) {
        $this->pallbearers = $pallbearers;

        return $this;
    }

    /**
     * Get pallbearers
     *
     * @return \Acme\MainBundle\Entity\Pallbearers 
     */
    public function getPallbearers() {
        return $this->pallbearers;
    }

    /**
     * Set casket
     *
     * @param \Acme\MainBundle\Entity\Casket $casket
     * @return User
     */
    public function setCasket(\Acme\MainBundle\Entity\Casket $casket = null) {
        $this->casket = $casket;

        return $this;
    }

    /**
     * Get casket
     *
     * @return \Acme\MainBundle\Entity\Casket 
     */
    public function getCasket() {
        return $this->casket;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->role);
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    
    
    
    
    /**
     * Set role
     *
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
}
