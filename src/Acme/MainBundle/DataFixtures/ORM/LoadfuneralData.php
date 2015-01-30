<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\funeral;

class LoadfuneralData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        $FuneralType = array('Burial','Cremation','Burial at Sea','Other');
        
        for ($i = 0; $i <= 3; $i++) {
            $funeral = new funeral();
            $funeral->setIsPublished(true);
            $funeral->setFuneralType($FuneralType[$i]);
            $manager->persist($funeral);
            $manager->flush();

            $this->addReference('funeral_id' . $i, $funeral);
        }
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 3; // the order in which fixtures will be loaded
    }

}
