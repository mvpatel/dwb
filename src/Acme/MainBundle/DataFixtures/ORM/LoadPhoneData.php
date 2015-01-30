<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\Phone;

class LoadPhoneData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        for ($i = 1; $i <= 200; $i++) {
            $phone = new Phone();
            $phone->setMobile('07'.rand(100000000,999999999));
            $phone->setHomePhone('020'.rand(10000000,99999999));
            $phone->setOfficePhone('020'.rand(10000000,99999999));
            $manager->persist($phone);
            $manager->flush();

            $this->addReference('phone_id' . $i, $phone);
        }
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 1; // the order in which fixtures will be loaded
    }

}
