<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use \Faker\Factory;

class CountryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // faker
        $faker = \Faker\Factory::create('fr_FR');

        /*
         * utilisation des entités avec les setters
         * $manager équivaut à $doctrine
         * chaque insertion des données fictives va vider toutes les tables
         * */
        for($i = 0; $i < 20; $i++) {
            $entity = new Country();
            $entity->setName($faker->unique()->country);

            $manager->persist($entity);


            /*
             * addReference
             *      - stocke l'entité en mémoire
             *      - permet d'utiliser l'entité dans une relation
             */
            $this->addReference('country' . $i , $entity);


        }
        $manager->flush();

    }

}