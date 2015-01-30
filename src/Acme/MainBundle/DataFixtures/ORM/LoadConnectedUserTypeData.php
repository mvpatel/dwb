<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\ConnectedUserType;

class LoadConnectedUserTypeData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        $connected_user_type = array('Nominee','Solicitor','InformTo','Helper','Publication');
        
        for ($i = 0; $i <= 4; $i++) {
            $connectedusertype = new ConnectedUserType();
            $connectedusertype->setIsPublished(true);
            $connectedusertype->setTypeName($connected_user_type[$i]);
            $manager->persist($connectedusertype);
            $manager->flush();

            $this->addReference('con_user_type_id' . $i, $connectedusertype);
        }
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 8; // the order in which fixtures will be loaded
    }

}
