<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\Address;

class LoadAddressData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        for ($i = 1; $i <= 200; $i++) {
            $address = new Address();
            $address->setCity('City ' . $i);
            $address->setCountry('Country ' . $i);
            $address->setLine1('Address Line 1 ' . $i);
            $address->setLine2('Address Line 2 ' . $i);
            $address->setLine3('Address Line 3 ' . $i);
            $address->setPostcode('Postcode ' . $i);
            $address->setState('State ' . $i);
            
            $manager->persist($address);
            $manager->flush();

            $this->addReference('address_id' . $i, $address);
        }
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 2; // the order in which fixtures will be loaded
    }

}
