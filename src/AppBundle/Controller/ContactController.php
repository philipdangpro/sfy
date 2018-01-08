<?php
/**
 * Created by PhpStorm.
 * User: wabap2-14
 * Date: 05/01/18
 * Time: 14:30
 * à remove dans Go to Settings -> Editor -> File and Code Templates -> Includes (TAB) -> PHP File Header
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactController extends Controller
{
    /**
     * @Route("/contact/form", name="contact.form")
     */
    public function formAction(Request $request, ManagerRegistry $doctrine):Response
    {
        /*doctrine avec em, EntityManager,gestionnaire d'entité et rc, RepositoryClass, classe de dépôt
            2 branches:
                - getManager : update / insert / delete
                - getRepository : select (update et delete sont possibles)
        */

        $em = $doctrine->getManager()->;

        //instances
        $entity = new Contact();
        $entityType = ContactType::class;

        //dump($entityType);

        //creation d'un formulaire
        $form = $this->createForm($entityType, $entity);

        // récupération des données dans la requête
        $form->handleRequest($request);

        //formulaire valide ?
        if($form->isSubmitted() && $form->isValid()){
            //récupération des données sous forme d'entité
            $data = $form->getData();
        }

        /*
         * createView : création des champs HTML
         */

        return $this->render('contact/form.html.twig', [
            'form' => $form->createView(),
            'tableaudetest' => 'gazgz'
        ]);
    }


}