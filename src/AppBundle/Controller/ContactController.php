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
use AppBundle\Repository\ContactRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactController extends Controller
{

    /**
     * @Route ("/contact", name="contact.index")
     */
    public function indexAction(ManagerRegistry $doctrine):Response
    {
        /* *
         * getRepository : cible la classe Repository d'une entité
         * méthodes de sélection fournies par défaut
         *      - findAll() : renvoie un array d'entité comme un fetchAll quoi
         *      - find($id)
         *      - findOneBy($conditions) : renvoie une entité en ciblant la valeur de colonnes
         * */
        $rc = $doctrine->getRepository(Contact::class);
        $results = $rc->findAll();


        return $this->render('contact/index.html.twig', [
            'results' => $results
        ]);
    }


    /**
     * @Route("/contact/form", name="contact.form", defaults={"id"=null})
     * @Route(
     *     "/contact/form/update/{id}",
     *     name="contact.form.update"
     *
     *
     * )
     */
    public function formAction(Request $request, ManagerRegistry $doctrine, $id):Response
    {
        /* doctrine avec em, EntityManager,gestionnaire d'entité et rc, RepositoryClass, classe de dépôt
            2 branches:
                - getManager : update / insert / delete
                - getRepository : select (update et delete sont possibles)
        */

        $em = $doctrine->getManager();
        $rc = $doctrine->getRepository(Contact::class);

        //instances
        $entity = $id ? $rc->find($id) : new Contact();
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

            // persist : mise en mémoire de la requête
            $em->persist($data);
            //exécuter la requête
            $em->flush();

            //ajout d'un message flash, le message est stocké dans la session
            $message = $id ? 'Le contact a été modifié' : 'le contact a été ajouté';
            $this->addFlash('notice', 'user ajouté');

            return $this->redirectToRoute('contact.index', ['keyone' => 'valueone']);

        }

        /*
         * createView : création des champs HTML
         */

        return $this->render('contact/form.html.twig', [
            'form' => $form->createView(),
            'tableaudetest' => 'ga'
        ]);
    }


    /**
     * @Route("/contact/form/delete/{id}", name="contact.form.delete")
     */

    public function deleteAction(ManagerRegistry $doctrine, int $id):Response
    {
        //action de suppression : sélection de l'entité puis suppression
        $em = $doctrine->getManager();
        $rc = $doctrine->getRepository(Contact::class);


        $entity = $rc->find($id);
        $em->remove($entity);
        $em->flush();




        $this->addFlash("notice", "le user " . $id . " a été supprimé");

        return $this->redirectToRoute('contact.index');
    }

}