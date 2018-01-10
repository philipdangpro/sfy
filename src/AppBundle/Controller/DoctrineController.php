<?php

namespace AppBundle\Controller;

use Doctrine\Common\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Contact;

class DoctrineController extends Controller
{
    /**
     * @Route("/query", name="doctrine.query")
     */
    public function indexAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine->getRepository(Contact::class)->testQuery();
        dump($results);die;
//        return $results;

    }


    /**
     * @Route("/querydeux", name="doctrine.querydeux")
     */
    public function indexDeuxAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine->getRepository(Contact::class)->testDeuxQuery();
        dump($results);die;
//        return $results;

    }

    /**
     * @Route("/querytrois", name="doctrine.querytrois")
     */
    public function indexTroisAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine->getRepository(Contact::class)->testTroisQuery();
        dump($results);die;
//        return $results;

    }

    /**
     * @Route("/queryquatre", name="doctrine.queryquatre")
     */
    public function indexQuatreAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Contact::class)
            ->testQuatreQuery();
        dump($results);die;
//        return $results;

    }

    /**
     * @Route("/querysix", name="doctrine.querysix")
     */
    public function indexSixAction(ManagerRegistry $doctrine):Response
    {
        $results = $doctrine
            ->getRepository(Contact::class)
            ->testDelete();
        dump($results);
        die;

    }

    /**
     * @Route("/queryupdate", name="doctrine.queryupdate")
     */
    public function updateAction(ManagerRegistry $doctrine, $contactId):Response
    {
        $result = $this
            ->getDoctrine()
            ->getRepository(Contact::class)
            ->testUpdate($contactId)
        ;

        return null;
    }
}
