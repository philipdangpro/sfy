<?php
/**
 * Created by PhpStorm.
 * User: wabap2-14
 * Date: 04/01/18
 * Time: 10:27
 * à remove dans Go to Settings -> Editor -> File and Code Templates -> Includes (TAB) -> PHP File Header
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TwigController extends Controller
{
    /**
     * @Route("/twig", name="twig.index")
     */

    public function indexAction(Request $request):Response
    {
        $arr = [
            'key1' => 'value1',
            'key2' => 'value2',
            'key3' => 'value3',
            'key4' => 'value4',
            'base_url' => $request->getBaseUrl()
        ];

        return $this->render('twig/index.html.twig', [
            'macle' => get_class($request),
            'liste' => $arr,

        ]);
    }

    /**
     * @Route("/twig/layout", name="twig.layout")
     */
    public function layoutAction():Response
    {
        return $this->render('twig/form.html.twig');
    }


}