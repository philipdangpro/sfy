<?php
/**
 * Created by PhpStorm.
 * User: wabap2-14
 * Date: 09/01/18
 * Time: 12:03
 * à remove dans Go to Settings -> Editor -> File and Code Templates -> Includes (TAB) -> PHP File Header
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Module;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use AppBundle\Repository\ModuleRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


class ModuleController extends Controller
{
    /**
     * @Route(
     *     "/module/{id}",
     *     name="module.index",
     *
     *     defaults={"id" = 1}
     * )
     */
    //requirements={"id" = "\d+"},
    public function moduleAction(ManagerRegistry $doctrine, int $id):Response
    {
        $em = $doctrine->getRepository(Module::class);

        if(!$em->find($id)){
            $this->addFlash('notice', 'Module inconnu');

            return $this->redirectToRoute('training.index');
        };

        $module = $em->find($id);
        $modules = $em->findAll();

        return $this->render('module/index.html.twig', [
            'id' => $id,
            'module' => $module,
            'modules' => $modules,
        ]);
    }
}