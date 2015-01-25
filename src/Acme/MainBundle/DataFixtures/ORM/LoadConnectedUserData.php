<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\ConnectedUser;

class LoadConnectedUserData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        for ($i = 1; $i <= 100; $i++) {
            $j = $i + 100;
            $connecteduser = new ConnectedUser();
            $connecteduser->setName('Name ' . $i);
            $connecteduser->setSurname('Surname ' . $i);
            $connecteduser->setAccessKey(rand(1000000000, 9999999999));
            $connecteduser->setEmail('con_email_' . $i . '@email.com');
            $connecteduser->setWebsite('website_' . $i . '.co.uk');

            $modifydate = new \DateTime('now');
            $modifydate->modify('-' . rand(0, 3) . ' month');
            $modifydate->modify('-' . rand(1, 28) . ' day');

            $connecteduser->setModifiedDate($modifydate);

            $connecteduser->setUser($this->getReference('user_id' . rand(1, 100)));
            $connecteduser->setPhone($this->getReference('phone_id' . $j));
            $connecteduser->setAddress($this->getReference('address_id' . $j));
            $connecteduser->setConnectedusertype($this->getReference('con_user_type_id' . rand(0,4)));
            $connecteduser->setSupport($this->getReference('support_id' . rand(0,2)));

            $manager->persist($connecteduser);
            $manager->flush();

            $this->addReference('con_user_id' . $i, $connecteduser);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 10; // the order in which fixtures will be loaded
    }

}
