<?php
/**
 * Created by PhpStorm.
 * User: wabap2-14
 * Date: 10/01/18
 * Time: 10:12
 * à remove dans Go to Settings -> Editor -> File and Code Templates -> Includes (TAB) -> PHP File Header
 */

namespace AppBundle\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Language;

class LanguageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 20; $i++){
            $entity = new Language();
            $entity->setName("language$i");
            $manager->persist($entity);
            $this->addReference("language$i", $entity);
        }

        $manager->flush();
    }
}