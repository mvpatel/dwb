<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\Pallbearers;

class LoadPallbearersData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        $pallbearersType = array('Pallbearers 1','Pallbearers 2','Pallbearers 3','Pallbearers 4');
        
        for ($i = 0; $i <= 3; $i++) {
            $pallbearers = new Pallbearers();
            $pallbearers->setIsPublished(true);
            $pallbearers->setPallbearersType($pallbearersType[$i]);
            $manager->persist($pallbearers);
            $manager->flush();

            $this->addReference('pallbearers_id' . $i, $pallbearers);
        }
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 5; // the order in which fixtures will be loaded
    }

}
