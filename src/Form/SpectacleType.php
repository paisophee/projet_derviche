<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Entity\Spectacle;
use App\Entity\Spectateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpectacleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'titre',
                TextType::class,
                [
                    'label' => 'Titre du spectacle'
                ])
            ->add('nom_cie',
                TextType::class,
                [
                    'label' => 'Nom de la compagnie'
                  ])
            ->add('resume',
                TextareaType::class,
                [
                    'label' => 'Resumé'
                  ])
            ->add('duree',
                IntegerType::class,
                [
                    'label' => 'Durée (en minutes)'
                  ])
            ->add('site_cie',
                UrlType::class,
                [
                    'label' => 'URL du site de la compagnie',
                    'required' => false
                  ])
            ->add('url_video',
                UrlType::class,
                [
                    'label' => 'URL de la video du spectacle',
                    'required' => false
                  ])
            ->add('critique',
                TextareaType::class,
                [
                    'label' => 'Critique du spectacle',
                    'required' => false
                  ])
            ->add('dossier',
                UrlType::class,
                [
                      'label' => 'URL du dossier du spectacle',
                      'required' => false
                  ])
            ->add('dossier_peda',
                UrlType::class,
                  [
                      'label' => 'URL du dossier pédagogique du spectacle',
                      'required' => false
                  ])
            ->add('spectateur',
                EntityType::class,
                [
                    'label' => 'Public visé',
                    'class' => Spectateur::class,
                    'choice_label' => 'type',
                    'placeholder' => 'Choisissez un public'
                  ])


            ->add('categorie',
                  EntityType::class,
                  [
                      'label' => 'Catégorie',
                      'class' => Categorie::class,
                      'choice_label' => 'type',
                      'placeholder' => 'Choisissez une catégorie',
                      'required' => false,
                      'multiple' => true,
                  ])

            ->add('sousCategorie',
                EntityType::class,
                  [
                      'label' => 'Sous-catégorie',
                      'class' => SousCategorie::class,
                      'choice_label' => 'type',
                      'placeholder' => 'Choisissez une sous-catégorie'
                  ])
            ->add(
                'image1',
                //input de type file
                FileType::class,
                [
                    'label' => 'Photo 1',
                    'required' => false,
                ])
            ->add(
                'image2',
                FileType::class,
                [
                    'label' => 'Photo 2',
                    'required' => false,
                ])
            ->add(
                'image3',
                FileType::class,
                [
                    'label' => 'Photo 3',
                    'required' => false,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Spectacle::class,
        ]);
    }
}
