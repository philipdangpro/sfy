<?php
/**
 * Created by PhpStorm.
 * User: wabap2-14
 * Date: 10/01/18
 * Time: 10:22
 * à remove dans Go to Settings -> Editor -> File and Code Templates -> Includes (TAB) -> PHP File Header
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ContactFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for($i = 0; $i < 20; $i++){

            $entity = new Contact();
            $firstname = $faker->firstName;
            $lastname = $faker->lastname;
            $entity->setFirstname($faker->firstName);
            $entity->setLastname($faker->lastName);
            $entity->setEmail($firstname . "." . $lastname . "@gmail.com");
            $entity->setMessage("lorem $i");

            /*
             * getReference : récupérer une référence créée dans une autre classe
             *      - récupérer une référence créée dans une autre classe
             *      - recommandé : utiliser la méthode getDependencies qui permet de gérer l'ordre des objets
             */
            $entity->setCountry(
                $this->getReference("country". $i)
            );
            $entity->addLanguage(
                $this->getReference("language10")
            );

            $manager->persist($entity);
            $this->addReference("$i", $entity);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CountryFixtures::class,
            LanguageFixtures::class,
        ];
    }

}