<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\Casket;

class LoadCasketData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        $casketType = array('Fine wood and quality finishes','Pine or equivalent','Eco-friendly option','Cardboard, lower-cost option','Novelty','Other');
        
        for ($i = 0; $i <= 5; $i++) {
            $casket = new Casket();
            $casket->setIsPublished(true);
            $casket->setCasketType($casketType[$i]);
            $manager->persist($casket);
            $manager->flush();

            $this->addReference('casket_id' . $i, $casket);
        }
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 6; // the order in which fixtures will be loaded
    }

}
