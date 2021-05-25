<?php

namespace App\DataFixtures;

use App\Entity\Module;
use App\Entity\Trainee;
use App\Entity\Location;
use App\Entity\TypeTraining;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ElanSessionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $module1 = new Module();
        $module1->setTitle("Back end");
        $manager->persist($module1);
        $module2 = new Module();
        $module2->setTitle("Front end");
        $manager->persist($module2);

        $typeDeFormation1 = new TypeTraining();
        $typeDeFormation1->setTitle("Développement")->setColor("blue");
        $manager->persist($typeDeFormation1);
        $typeDeFormation2 = new TypeTraining();
        $typeDeFormation2->setTitle("Bureautique")->setColor("orange");
        $manager->persist($typeDeFormation2);
        $typeDeFormation3 = new TypeTraining();
        $typeDeFormation3->setTitle("Comptabilité")->setColor("green");
        $manager->persist($typeDeFormation3);
        
        $lieu1 = new Location();
        $lieu1->setAdress("202 Avenue de Colmar")->setPostalCode("67100")->setCity("Strasbourg");
        $manager->persist($lieu1);
        $lieu2 = new Location();
        $lieu2->setAdress("14 Rue de Rhin")->setPostalCode("67100")->setCity("Strasbourg");
        $manager->persist($lieu2);

        $stagiaire1 = new Trainee();
        $stagiaire1->setFirstName("Maria")->setLastName("Markina")->setEmail("markina@gmail.com")->setAdress("18 Rue des Saales")->setPostalCode("67000")->setCity("Strasbourg")->setPhone("0611221122")->setNumberPoleEmploi("1234567M");
        $manager->persist($stagiaire1);
        $stagiaire2 = new Trainee();
        $stagiaire2->setFirstName("Julien")->setLastName("Michaud")->setEmail("michaud@gmail.com")->setAdress("10 Rue de la Gare")->setPostalCode("67000")->setCity("Strasbourg")->setPhone("0722332233")->setNumberPoleEmploi("2345678J");
        $manager->persist($stagiaire2);

        $manager->flush();
    }
}
