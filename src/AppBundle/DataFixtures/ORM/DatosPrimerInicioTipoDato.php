<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\TipoDato;

class DatosPrimerInicioTipoDato extends AbstractFixture implements OrderedFixtureInterface 
{
    public function getOrder() {
        return 1;
    }

    public function load(ObjectManager $manager) {
        
        $tipoDato01 = new TipoDato();
        $tipoDato01->setId(1);
        $tipoDato01->setDescripcion('Dirección');
        
        $tipoDato02 = new TipoDato();
        $tipoDato02->setId(2);
        $tipoDato02->setDescripcion('Comuna');
        
        $tipoDato03 = new TipoDato();
        $tipoDato03->setId(3);
        $tipoDato03->setDescripcion('Email');
        
        $tipoDato04 = new TipoDato();
        $tipoDato04->setId(4);
        $tipoDato04->setDescripcion('Telefono');
        
        $manager->persist($tipoDato01);
        $manager->persist($tipoDato02);
        $manager->persist($tipoDato03);
        $manager->persist($tipoDato04);

        $manager->flush();
        
    }
}
