<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * @Route("/{_locale}")
 */
// _locale est une variable symfony
class TranslationController extends Controller
{
    /**
     * @Route("/translation", name="translation.index")
     */
    public function indexAction(Request $request, LoggerInterface $logger, TranslatorInterface $translator):Response
    {
        $logger->debug("lorem debug");
        $logger->alert("alert lorem");
        $logger->info("info lorem lorem");
        $logger->notice("notice lorem notice");

        /*
         * accéder à la locale : à partir de la requête
         * accéder au service de traduction : TranslatorInterface
         */

        dump($request->getLocale(), $translator->trans('content.replacement', ['%name%' => 'AliMero']));

//        die;

        return $this->render('translation/index.html.twig', [
            'now' => new \DateTime()
        ]);
    }

}
