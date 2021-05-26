<?php

namespace App\DataFixtures;

use App\Entity\Module;
use App\Entity\Session;
use App\Entity\Trainee;
use App\Entity\Location;
use App\Entity\Training;
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

        $formation1 = new Training;
        $formation1->setTitle('Developpeur WEB & WEB mobile');
        $manager->persist($formation1);
        $formation2 = new Training;
        $formation2->setTitle('Assistante de direction');
        $manager->persist($formation2);


        $typeDeFormation1 = new TypeTraining();
        $typeDeFormation1->setTitle("Développement")->setColor("blue");
        $manager->persist($typeDeFormation1);
        $typeDeFormation2 = new TypeTraining();
        $typeDeFormation2->setTitle("Bureautique")->setColor("orange");
        $manager->persist($typeDeFormation2);
        $typeDeFormation3 = new TypeTraining();
        $typeDeFormation3->setTitle("Comptabilité")->setColor("green");
        $manager->persist($typeDeFormation3);
        $typeDeFormation4 = new TypeTraining();
        $typeDeFormation4->setTitle("Dentaire")->setColor("yellow");
        $manager->persist($typeDeFormation4);
        $typeDeFormation5 = new TypeTraining();
        $typeDeFormation5->setTitle("Technique de vente")->setColor("red");
        $manager->persist($typeDeFormation5);
        $typeDeFormation6 = new TypeTraining();
        $typeDeFormation6->setTitle("Infographie")->setColor("purple");
        $manager->persist($typeDeFormation6);



        $lieu1 = new Location();
        $lieu1->setAdress("202 Avenue de Colmar")->setPostalCode("67100")->setCity("Strasbourg");
        $manager->persist($lieu1);
        $lieu2 = new Location();
        $lieu2->setAdress("14 Rue de Rhin")->setPostalCode("67100")->setCity("Strasbourg");
        $manager->persist($lieu2);
        $lieu3 = new Location();
        $lieu3->setAdress("3 Rue du chat qui tousse")->setPostalCode("67000")->setCity("Strasbourg");
        $manager->persist($lieu3);
        $lieu4 = new Location();
        $lieu4->setAdress("230 Avenue de Colmar")->setPostalCode("67100")->setCity("Strasbourg");
        $manager->persist($lieu4);

        $stagiaire1 = new Trainee();
        $stagiaire1->setFirstName("Maria")->setLastName("Markina")->setEmail("markina@gmail.com")->setAdress("18 Rue des Saales")->setPostalCode("67000")->setCity("Strasbourg")->setPhone("0611221122")->setNumberPoleEmploi("1234567M");
        $manager->persist($stagiaire1);
        $stagiaire2 = new Trainee();
        $stagiaire2->setFirstName("Julien")->setLastName("Michaud")->setEmail("michaud@gmail.com")->setAdress("10 Rue de la Gare")->setPostalCode("67000")->setCity("Strasbourg")->setPhone("0722332233")->setNumberPoleEmploi("2345678J");
        $manager->persist($stagiaire2);
        $stagiaire3 = new Trainee();
        $stagiaire3->setFirstName("Mauricette")->setLastName("Henry")->setEmail("henry@gmail.com")->setAdress("3 rue des Prés")->setPostalCode("67210")->setCity("Obernai")->setPhone("0722456233")->setNumberPoleEmploi("3754854M");
        $manager->persist($stagiaire3);
        $stagiaire4 = new Trainee();
        $stagiaire4->setFirstName("Georges")->setLastName("Delajungle")->setEmail("delajungle@gmail.com")->setAdress("7 Rue de la Savane")->setPostalCode("67600")->setCity("Selestat")->setPhone("0721234533")->setNumberPoleEmploi("7580854G");
        $manager->persist($stagiaire4);
        $stagiaire5 = new Trainee();
        $stagiaire5->setFirstName("Abel")->setLastName("Auboisdormant")->setEmail("auboisdormant@gmail.com")->setAdress("29 Rue du Château")->setPostalCode("67210")->setCity("Obernai")->setPhone("0653876244")->setNumberPoleEmploi("4785627A");
        $manager->persist($stagiaire5);
        $stagiaire6 = new Trainee();
        $stagiaire6->setFirstName("Barrack")->setLastName("Afritt")->setEmail("afritt@gmail.com")->setAdress("31 Place des Belges")->setPostalCode("67000")->setCity("Strasbourg")->setPhone("0631323334")->setNumberPoleEmploi("4368465A");
        $manager->persist($stagiaire6);
        $stagiaire7 = new Trainee();
        $stagiaire7->setFirstName("Brice")->setLastName("Glace")->setEmail("glace@gmail.com")->setAdress("43 Route de l'Antartique")->setPostalCode("67300")->setCity("Strasbourg")->setPhone("0643658798")->setNumberPoleEmploi("2578453G");
        $manager->persist($stagiaire7);
        $stagiaire7 = new Trainee();
        $stagiaire7->setFirstName("Edith")->setLastName("Orial")->setEmail("orial@gmail.com")->setAdress("104 Route Gutenberg")->setPostalCode("67000")->setCity("Strasbourg")->setPhone("0653876244")->setNumberPoleEmploi("4587905O");
        $manager->persist($stagiaire7);

        $session1 = new Session();
        $session1->setTitle('DL11')->setMinimumTrainees(5)->setMaximumTrainees(12)->setStartDate(new \DateTime('2021-06-04'))->setEndDate(new \DateTime('2021-12-04'))->setTraining($formation1)->setLocation($lieu1);
        $manager->persist($session1);
        $session2 = new Session();
        $session2->setTitle('AD14')->setMinimumTrainees(5)->setMaximumTrainees(12)->setStartDate(new \DateTime('2021-06-09'))->setEndDate(new \DateTime('2021-12-09'))->setTraining($formation2)->setLocation($lieu3);
        $manager->persist($session2);


        $manager->flush();
    }
}
