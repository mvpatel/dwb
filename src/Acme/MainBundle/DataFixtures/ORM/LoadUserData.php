<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        for ($i = 1; $i <= 100; $i++) {
            $user = new User();
            $user->setUsername('username_' . $i);
            $user->setRole('ROLE_' . rand(0,3));
            $user->setFirstName('First Name ' . $i);
            $user->setMiddleName('Middle Name ' . $i);
            $user->setSurname('Surname ' . $i);
            $user->setBirthPlace('Birth Place ' . $i);
            $user->setEmail('email_' . $i . '@email.com');
            $user->setPassword('password_' . $i);

            $birthdate = new \DateTime('now');
            $birthdate->modify('-'.rand(18,100).' year');
            $birthdate->modify('-'.rand(1,12).' month');
            $birthdate->modify('-'.rand(1,28).' day');

            $user->setDob($birthdate);
            $user->setFavouriteCity('Favourite City ' . $i);
            $user->setGuestService('Guest Service ' . $i);
            $user->setIsActive(1);

            $modifydate = new \DateTime('now');
            $modifydate->modify('-'.rand(0,3).' month');
            $modifydate->modify('-'.rand(1,28).' day');
            
            $user->setModifiedDate($modifydate);
            $user->setPhone($this->getReference('phone_id' . $i));
            $user->setAddress($this->getReference('address_id' . $i));
            $user->setFuneral($this->getReference('funeral_id' . rand(0,3)));
            $user->setArrivalFuneral($this->getReference('arrival_funeral_id' . rand(0,3)));
            $user->setPallbearers($this->getReference('pallbearers_id' . rand(0,3)));
            $user->setCasket($this->getReference('casket_id' . rand(0,5)));

            $manager->persist($user);
            $manager->flush();

            $this->addReference('user_id' . $i, $user);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 7; // the order in which fixtures will be loaded
    }

}
