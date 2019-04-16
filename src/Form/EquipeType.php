<?php

namespace App\Form;

use App\Entity\Equipe;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;

class EquipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',
                TextType::class,
                [
                    'label' => 'Nom'
                ]
            )
            ->add('prenom',
                TextType::class,
                [
                    'label' => 'Prénom'
                ]
            )
            ->add('email',
                EmailType::class,
                [
                    'label' => 'Email'
                ]
            )
            ->add(
                'plainPassword',

                RepeatedType::class,
                [

                    'type' => PasswordType::class,

                    'first_options' => [
                        'label' => 'Mot de passe'
                    ],

                    'second_options' => [
                        'label' => 'Confirmation du mot de passe'
                    ],

                    'invalid_message' => 'La confirmation ne correspond pas au mot de passe'
                ]
            )
            ->add(
                'statut',
                ChoiceType::class,[
                    'choices'=>[
                    'ROLE_USER' => 'ROLE_USER',
                    'ROLE_ADMIN' => 'ROLE_ADMIN'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Equipe::class,
        ]);
    }
}
