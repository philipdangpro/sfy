<?php
/**
 * Created by PhpStorm.
 * User: wabap2-14
 * Date: 11/01/18
 * Time: 09:20
 * à remove dans Go to Settings -> Editor -> File and Code Templates -> Includes (TAB) -> PHP File Header
 */

namespace AppBundle\Controller;

//classes pour utiliser le controller
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


//classes
//classe repository pour les select
//classe manager pour tout le reste
use AppBundle\Entity\Acteur;
use AppBundle\Entity\Film;
use AppBundle\Entity\Realisateur;

//classe d'entités utilisés
use Doctrine\Common\Persistence\ManagerRegistry;



class CinemaController extends Controller
{
    /**
     * @Route("/cinema/one", name="cinema.query.one")
     */
    //ONE Sélectionner **toutes les colonnes de tous les films**
    public function oneAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine->getRepository(Film::class)
            ->queryOne();

        dump($results);
        die;
    }

    /**
     * @Route("/cinema/two", name="cinema.query.two")
     */
    //TWO Sélectionner le **nom de tous les réalisateurs**
    public function twoAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Realisateur::class)
            ->queryTwo();

        dump($results);
        die;
    }

    /**
     * @Route("/cinema/three", name="cinema.query.three")
     */
    //THREE Sélectionner le **titre** et la **description** de tous les films en utilisant des **alias**
    public function threeAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Film::class)
            ->queryThree();

        dump($results);
        die;
    }

    /**
     * @Route("/cinema/four", name="cinema.query.four")
     */
    //FOUR Sélectionner le **titre** des films sortis à partir de **1980** et qui possède le mot **les** dans le titre
    public function fourAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Film::class)
            ->queryFour();

        dump($results);
        die;
    }


    /**
     * @Route("/cinema/five", name="cinema.query.five")
     */
    // FIVE Sélectionner le **titre** des films dont le réalisateur est **Akira Kurosawa**
    public function fiveAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Film::class)
            ->queryFive();

        dump($results);
        die;
    }


    /**
     * @Route("/cinema/six", name="cinema.query.six")
     */
    //SIX Sélectionner le **titre** et le **genre** des films de **Sergio Leone**
    public function sixAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Film::class)
            ->querySix();

        dump($results);
        die;
    }

    /**
     * @Route("/cinema/seven", name="cinema.query.seven")
     */
    //SEVEN Sélectionner le **nom des acteurs français** ayant joué dans des films de **Steven Spielberg**
    public function sevenAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Acteur::class)
            ->querySeven();

        dump($results);
        die;
    }

    /**
     * @Route("/cinema/eight", name="cinema.query.eight")
     */
    //EIGHT Sélectionner le **titre**, la **date de sortie** et le **nom du réalisateur** des films sortis dans les années **1990**
    public function eightAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Film::class)
            ->queryEight();

        dump($results);
        die;
    }

    /**
     * @Route("/cinema/nine", name="cinema.query.nine")
     */
    //NINE Sélectionner le **nom des acteurs** et les classer par **ordre alphabétique**
    public function nineAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Acteur::class)
            ->queryNine();

        dump($results);
        die;
    }

    /**
     * @Route("/cinema/ten", name="cinema.query.ten")
     */
    //TEN Sélectionner le **nombre de films par réalisateur** et les classer par **ordre alphabétique**
    public function tenAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Realisateur::class)
            ->queryTen();

        dump($results);
        die;
    }

    /**
     * @Route("/cinema/eleven", name="cinema.query.eleven")
     */
    //ELEVEN Sélectionner le **nombre de films** sortis en **1968**
    public function elevenAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Film::class)
            ->queryEleven();

        dump($results);
        die;
    }

    /**
     * @Route("/cinema/twelve", name="cinema.query.twelve")
     */
    //TWELVE Sélectionner le **film le plus récent**
    public function twelveAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Film::class)
            ->queryTwelve();

        dump($results);
        die;
    }

    /**
     * @Route("/cinema/thirteen", name="cinema.query.thirteen")
     */
    //THIRTEEN Sélectionner un **film au hasard**
    public function thirteenAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Film::class)
            ->queryThirteen();

        dump($results);
        die;
    }
}