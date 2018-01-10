<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /*
         * utilisation des entités avec les setters
         * $manager équivaut à $doctrine
         * chaque insertion des données fictives va vider toutes les tables
         * */
        for($i = 0; $i < 20; $i++) {
            $entity = new Country();
            $entity->setName("country$i");

            $manager->persist($entity);


            /*
             * addReference
             *      - stocke l'entité en mémoire
             *      - permet d'utiliser l'entité dans une relation
             */
            $this->addReference("country$i", $entity);


        }
        $manager->flush();

    }

}