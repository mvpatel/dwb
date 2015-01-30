<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\ArrivalFuneral;

class LoadArrivalFuneralData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        $arrivalfuneraltype = array('Standard Hearse','Stretch or Special Hearse','Horse-drawn Carriage','Other');
        
        for ($i = 0; $i <= 3; $i++) {
            $arrivalfuneral = new ArrivalFuneral();
            $arrivalfuneral->setIsPublished(true);
            $arrivalfuneral->setArrivalFuneralType($arrivalfuneraltype[$i]);
            $manager->persist($arrivalfuneral);
            $manager->flush();

            $this->addReference('arrival_funeral_id' . $i, $arrivalfuneral);
        }
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 4; // the order in which fixtures will be loaded
    }

}
