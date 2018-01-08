<?php
/**
 * Created by PhpStorm.
 * User: wabap2-14
 * Date: 04/01/18
 * Time: 12:20
 * à remove dans Go to Settings -> Editor -> File and Code Templates -> Includes (TAB) -> PHP File Header
 */

namespace AppBundle\Twig;

/*
 * création de fonctions et filtre twig:
 *  classe extends Twig_Extension
 */

class AppExtension extends \Twig_Extension
{
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
        ];
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

}