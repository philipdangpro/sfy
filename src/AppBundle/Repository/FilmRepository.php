<?php

namespace AppBundle\Repository;

/**
 * FilmRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FilmRepository extends \Doctrine\ORM\EntityRepository
{
    public function queryOne()
    {
        $results = $this->findAll();
        return $results;

    }

    public function queryThree()
    {
        $results = $this
            //on crée la requête et on définit l'alias
            ->createQueryBuilder('asfilm')
            //on select en utilisant l'alias
            ->select('asfilm.titre AS t, asfilm.description AS d')
            ->getQuery()
            ->getResult();

        return $results;

    }

//FOUR Sélectionner le **titre** des films sortis à partir de **1980** et qui possède le mot **les** dans le titre
    public function queryFour()
    {
        $results = $this
            //on crée la requête et on définit l'alias
            ->createQueryBuilder('asfilm')
            //on select en utilisant l'alias
            ->select("DATE_FORMAT(asfilm.dateSortie, '%Y') AS ds, asfilm.titre AS t")
            ->where(' YEAR(asfilm.dateSortie) >= :param1')
            ->andWhere('asfilm.titre LIKE :param2')
            ->setParameters([
                'param1' => '1980',
                'param2' => '%les%'
            ])
            ->getQuery()
            ->getResult();

        return $results;

    }

    // FIVE Sélectionner le **titre** des films dont le réalisateur est **Akira Kurosawa**
    public function queryFive()
    {
        $results = $this
            //on crée la requête et on définit l'alias
            ->createQueryBuilder('asfilm')
            //on select en utilisant l'alias et utiliser un group_concat
            ->select("asfilm.titre AS t, as_real.nom as n, as_real.prenom as p")
            //joindre en utilisant colonne relationnelle (de jointure)
            ->join('asfilm.realisateurs', 'as_real')
            ->where('as_real.nom = :param1')
            ->andWhere('as_real.prenom = :param2')
            ->setParameters([
                'param1' => 'Kurosawa',
                'param2' => 'Akira',
            ])
            ->getQuery()
            ->getResult();

        return $results;
    }

    //SIX Sélectionner le **titre** et le **genre** des films de **Sergio Leone**
    public function querySix()
    {
        $results = $this
            //on crée la requête et on définit l'alias
            ->createQueryBuilder('as_film')
            //on select en utilisant l'alias et utiliser un group_concat
            ->select("GROUP_CONCAT(as_film.titre SEPARATOR ' | ') AS t, as_real.nom AS n, as_real.prenom AS p, as_genre.nom AS g")
            //joindre en utilisant colonne relationnelle (de jointure)
            ->join('as_film.realisateurs', 'as_real')
            ->join('as_film.genres', 'as_genre')
            ->where('as_real.prenom = :param1')
            ->andWhere('as_real.nom = :param2')
            ->groupBy('n, p, g')
            ->setParameters([
                'param1' => 'Sergio',
                'param2' => 'Leone',
            ])
            ->getQuery()
//            ->getDQL();
            ->getResult();

        return $results;
    }

    //EIGHT Sélectionner le **titre**, la **date de sortie** et le **nom du réalisateur** des films sortis dans les années **1990**
    public function queryEight()
    {
        $results = $this
            //on crée la requête et on définit l'alias
            ->createQueryBuilder('as_film')
            //on select en utilisant l'alias et utiliser un group_concat
            ->select("as_film.titre as t, DATE_FORMAT(as_film.dateSortie, '%Y') as ds, as_real.nom")
            //joindre en utilisant colonne relationnelle (de jointure)
            ->join('as_film.realisateurs', 'as_real')
            ->where('YEAR(as_film.dateSortie) >= :param1')
            ->andWhere('YEAR(as_film.dateSortie) < :param2')
//            ->andWhere('as_real.nom')
            ->setParameters([
                'param1' => 1990,
                'param2' => 2000,
            ])
            ->getQuery()
            ->getResult();

        return $results;
    }

    //ELEVEN Sélectionner le **nombre de films** sortis en **1968**
    public function queryEleven()
    {
        $results = $this
            ->createQueryBuilder('as_film')
            ->select("COUNT(as_film.id) as nb_films, as_film.dateSortie as ds")
            ->where("YEAR(as_film.dateSortie) = :param1")
            ->groupBy('ds')
            ->setParameters([
                'param1' => 1968
            ])
            ->getQuery()
            ->getResult()
        ;

        return $results;
    }

    //TWELVE Sélectionner le **film le plus récent**
    public function queryTwelve()
    {
        $results = $this
            ->createQueryBuilder('as_film')
            ->select("as_film.titre, DATE_FORMAT(as_film.dateSortie,'%Y-%m-%d') as ds")
            ->orderBy("ds", 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;

        return $results;
    }


    //TWELVE Sélectionner le **film le plus récent**
    public function queryThirteen()
    {
        $results = $this
            ->createQueryBuilder('as_film')
            ->select("as_film.titre")
            ->where("
                as_film.id = (
                    FLOOR(
                        1 + RAND()
                    ) 
                    * COUNT(as_film.id)
                )
            ")
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;

        return $results;
    }
}
