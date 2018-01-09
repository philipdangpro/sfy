<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="default.index")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route(
     *     "/hello/{firstname}",
     *     name="default.hello",
     *     requirements={"firstname" = "[a-z]*"},
     *     defaults={"firstname" = null}
     *     )
     */
    public function helloAction($firstname, Request $request):Response
    {
        $firstname === null ?: 'anonyme';

        dump($this->container);
        dump($request->cookies->get('PHPSESSID'));
        dump($request->headers->get('host'));
        //dump($request->cookie);

        $view = $this->render('default/hello.html.twig', [
            'param' => $firstname
        ]);
        return $this->render('default/hello.html.twig', [
            'param' => $firstname
        ]);
    }
}
