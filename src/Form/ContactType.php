<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'lastname',
                TextType::class,
                [
                    'label' => 'Nom',
                    'constraints' => [
                        new NotBlank(
                            [
                            'message' => 'Le nom est obligatoire'
                             ])
                    ]
                ])
            -> add(
                'firstname',
                TextType::class,
                [
                    'label' => 'Prénom',
                    'constraints' => [
                        new NotBlank(
                            [
                                'message' => 'Le prénom est obligatoire'
                            ])
                    ]
                ])
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => "Votre email",
                    'constraints' => [
                        new NotBlank(
                            [
                                'message' => 'L\'email est obligatoire'
                            ]),
                        new Email(
                            [
                                'message' => 'L\'email n\'est pas valide'
                            ]
                        )
                    ]
                ])
            ->add(
                'statut',
                ChoiceType::class,
                [
                    'label' => 'Vous êtes',
                    'choices' => [
                        'choisissez' => null,
                        'un particulier' => 'particulier',
                        'un programateur' => 'programateur',
                        'une compagnie' => 'compagnie',
                        'autre' => 'autre'
                    ]
                ]

            )
            ->add(
                'objet',
                TextType::class,
                [
                    'label' => 'Objet',
                    'constraints' =>[
                        new NotBlank(
                            [
                                'message' => 'L\'objet est obligatoire'
                            ]
                        )
                    ]
                ])
            ->add(
                'body',
                TextareaType::class,
                [
                    'label' => 'Votre message',
                    'constraints' =>[
                        new NotBlank(
                            [
                                'message' => 'Le message est obligatoire'

                            ]),
                        new Length(
                            [
                                'min' => 12,
                                'minMessage' => 'Votre message doit faire au moins 12 caractères'
                            ]
                        )
                    ]
                ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
