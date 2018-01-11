<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/{_locale}")
 */
// _locale est une variable symfony
class TranslationController extends Controller
{
    /**
     * @Route("/translation", name="translation.index")
     */
    public function indexAction():Response
    {
        return $this->render('translation/index.html.twig', []);
    }

}
