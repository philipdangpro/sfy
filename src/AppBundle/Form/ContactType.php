<?php

namespace AppBundle\Form;

use AppBundle\Entity\Contact;
use AppBundle\Entity\Country;
use AppBundle\Entity\Language;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
         * add: ajouter un champ au formulaire
         * paramètres:
         *      - nom du champ récupéré par la vue
         *      - type du champ
         *      - options
         *          - contraintes de validation
         */
        $builder
            ->add('firstname', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Vous n'avez pas saisi votre nom"
                    ]),
                    new Regex([
                        'message' => "votre prénom n'est pas valide REGEX",
                        'pattern' => "/[a-zA-Z '-]+/"
                    ])

                ]
            ])
            ->add('lastname', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Vous n'avez pas saisi votre prénom",
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                //on peut tester si le host existe avec checkHost
                //on peut tester si le host existe avec checkMX
                'constraints' => [
                    new NotBlank([
                        'message' => "Vous avez saisi un email invalide",
                    ]),
                    new Email([
                        'message' => "votre email est incorrect",
                        'checkHost' => true,
                        'checkMX' => true,
                    ])
                ]
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "vous n'avez pas saisi votre message"
                    ])
                ]
            ])
            //ça permet de faire le lien à une FK
            /*
             * champ relié à une entité : EntityType
             *      class: permet de cibler l'entité
             *      placeholder : permet de définir le texte affiché dans le champ par défaut
             */
            ->add('country', EntityType::class, [
                'class' => Country::class,
                'choice_label' => 'name', //ici on parle de la colonne name de Country
                'placeholder' => 'Veuillez sélectionner un pays',
                'constraints' => [
                    new NotBlank([
                        'message' => "vous n'avez pas saisi votre message",
                    ])]
            ])
            /*
             * gestion de l'affichage des champs multiples
             *      expanded: afficher plusieurs champs
             *      multiple : récupérer plusieurs valeurs
             *      par défaut : false pour les 2 propriétés
             *
             *      select : expanded => false / multiple => false
             *      radio : expanded => true / multiple => true
             *
             * checkbox est obligatoire pour les many-to-many
             */
            ->add('languages', EntityType::class,
            [
                'class' => Language::class,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'constraints' => [
                    new Count([
                        'min' => 1,
                        'minMessage' => 'il faut sélectionner au moins {{ limit }} langue'
                    ])
                ]
            ])

        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
