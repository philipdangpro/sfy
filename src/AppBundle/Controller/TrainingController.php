<?php
/**
 * Created by PhpStorm.
 * User: wabap2-14
 * Date: 09/01/18
 * Time: 12:03
 * à remove dans Go to Settings -> Editor -> File and Code Templates -> Includes (TAB) -> PHP File Header
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Training;
use AppBundle\Entity\Module;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ManagerRegistry;
use AppBundle\Repository\TrainingRepository;



class TrainingController extends Controller
{
    /**
     * @Route("/trainings", name="training.index")
     */
    public function indexAction(ManagerRegistry $doctrine):Response
    {
        $em = $doctrine->getRepository(Training::class);
        $trainings = $em->findAll();


        return $this->render('training/index.html.twig', [
            'trainings' => $trainings
        ]);
    }

    /**
     * @Route(
     *     "/training/{id}",
     *     name="training.show"
     * )
     */
    public function showAction(ManagerRegistry $doctrine, int $id):Response
    {
        $emTraining = $doctrine->getRepository(Training::class);

        if(!$emTraining->find($id)){
            $this->addFlash('notice', 'Formation inconnue');

            return $this->redirectToRoute('training.index');
        };
        $training = $emTraining->find($id);
        $trainings = $emTraining->findAll();



        return $this->render('training/show.html.twig', [
            'id' => $id,
            'training' => $training,
            'trainings' => $trainings
        ]);
    }

}