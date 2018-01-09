<?php
/**
 * Created by PhpStorm.
 * User: wabap2-14
 * Date: 04/01/18
 * Time: 12:20
 * à remove dans Go to Settings -> Editor -> File and Code Templates -> Includes (TAB) -> PHP File Header
 */

namespace AppBundle\Twig;

use AppBundle\Entity\Training;

/*
 * création de fonctions et filtre twig:
 *  classe extends Twig_Extension
 */

class AppExtension extends \Twig_Extension
{
    /*
     * injection de services dans une classe autre qu'un contrôleur
     *      créer une propriété par service
     *      injecter les services par le constructeur
     *
     */
    private $doctrine;
    private $twig;

    public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $doctrine, \Twig_Environment $twig)
    {
        $this->doctrine = $doctrine;
        $this->twig = $twig;
    }







    /*
     * création d'une fonction
     *  renvoie un array de nvelles fctions
     *      1er param : nom de la fction
     *      2e param : callable
     *          - objet possédant la méthode appelée
     *          - nom de la mthd php
     */

    public function getFunctions():array
    {
        return [
            new \Twig_SimpleFunction('my_test',[$this, 'myTest']),
            new \Twig_SimpleFunction('date_diff',[$this, 'dateDiff']),
            new \Twig_SimpleFunction('render_menu', [$this, 'renderMenu'])
        ];
    }

    public function renderMenu()
    {
        //requête avec le service doctrine
        $rc = $this->doctrine->getRepository(Training::class);
        $results = $rc->findAll();

        //envoi des résultats à une vue partielle
        return $this->twig->render('inc/training.nav.html.twig', [
            'results' => $results
        ]);
    }

    public function myTest()
    {
        return 'yoyomontest';
    }

    public function dateDiff(\DateTime $postDate)
    {
        $now = new \DateTime();
        $diff = $now->diff($postDate);

        dump($diff);

        return $diff;
    }

    public function getFilters():array
    {
        return [
            new \Twig_SimpleFilter('my_filter',[$this, 'myFilter']),
            new \Twig_SimpleFilter('slugify',[$this, 'slugify']),
        ];
    }

    /**
     * @param $value string to slugify
     * @return array
     */
    public function slugify($value)
    {
        //return 'slufigu';
        return implode('-',explode(' ', $value));
    }

//    public function displayTrainingNav(ManagerRegistry $doctrine)
//    {
//        $em = $doctrine->getRepository(Training::class);
//        $trainings = $em->findAll();
//
//        return $trainings;
//    }
}