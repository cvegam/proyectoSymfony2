<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\ManejoError;

class DatosPrimerInicioManejoError extends AbstractFixture implements OrderedFixtureInterface 
{
    public function getOrder() {
        return 0;
    }

    public function load(ObjectManager $manager) {
        
        $tipoDato00 = new ManejoError();
        $tipoDato00->setId(0);
        $tipoDato00->setDescripcion('No contiene error');
        
        $tipoDato01 = new ManejoError();
        $tipoDato01->setId(1);
        $tipoDato01->setDescripcion('Direccion no coincide');
        
        $tipoDato02 = new ManejoError();
        $tipoDato02->setId(2);
        $tipoDato02->setDescripcion('Comuna no coincide');
        
        $tipoDato03 = new ManejoError();
        $tipoDato03->setId(3);
        $tipoDato03->setDescripcion('Formato email no coincide');
        
        $tipoDato04 = new ManejoError();
        $tipoDato04->setId(4);
        $tipoDato04->setDescripcion('Numero es menro a 9 digitos');
        
        $tipoDato05 = new ManejoError();
        $tipoDato05->setId(5);
        $tipoDato05->setDescripcion('Numero es mayor a 9 digitos');
        
        $tipoDato06 = new ManejoError();
        $tipoDato06->setId(6);
        $tipoDato06->setDescripcion('Numero contiene texto o simbolos');
        
        $manager->persist($tipoDato00);
        $manager->persist($tipoDato01);
        $manager->persist($tipoDato02);
        $manager->persist($tipoDato03);
        $manager->persist($tipoDato04);
        $manager->persist($tipoDato05);
        $manager->persist($tipoDato06);

        $manager->flush();
        
    }
}
