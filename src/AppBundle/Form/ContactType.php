<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
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
            ->add('message', TextareaType::class)
            ->add('country', CountryType::class)
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
