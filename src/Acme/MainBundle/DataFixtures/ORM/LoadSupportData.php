<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\Support;

class LoadSupportData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        $support_Type = array('Family Affairs','Business Affairs','Personal Finances');
        
        for ($i = 0; $i <= 2; $i++) {
            $support = new Support();
            $support->setIsPublished(true);
            $support->setSupportType($support_Type[$i]);
            $manager->persist($support);
            $manager->flush();

            $this->addReference('support_id' . $i, $support);
        }
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 9; // the order in which fixtures will be loaded
    }

}
