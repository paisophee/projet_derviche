<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Entity\Spectacle;
use App\Entity\Spectateur;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
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
                CKEditorType::class,
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
                CKEditorType::class,
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
                      'placeholder' => 'Choisissez une sous-catégorie',
                        'required' => false

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
            ->add(
                'enSavoirPlus',
                CKEditorType::class,
                [
                    'label' => 'En savoir plus',
                    'required' => false,
                ]
            )
            ->add(
                'texteComplementaire',
                CKEditorType::class,
                [
                    'label' => 'Texte complémentaire',
                    'required' => false,
                ]
            )
            ->add(
                'enTournee',
                TextType::class,
                [
                    'label' => 'Nombre et role des personnes en tournée',
                    'required' => false,
                ]
            )
            ->add(
                'departement',
                IntegerType::class,
                [
                    'label' => 'N° département de la cie',
                    'required' => false,
                ]
            )
            ->add(
                'ageSpectateurs',
                IntegerType::class,
                [
                    'label' => 'Age à partir de',
                    'required' => false,
                ]
            )
            ->add(
                'mailContact',
                TextType::class,
                [
                    'label' => 'Mail du contact Derviche',
                    'required' => false,
                ]
            )
            ->add(
                'representations',
                CKEditorType::class,
                [
                    'label' => 'Date et lieu de representations',
                    'required' => false,
                ]
            )
            ->add(
                'noteMiseEnScene',
                CKEditorType::class,
                [
                    'label' => 'Note du metteur en scène ou du chorégraphe',
                    'required' => false,
                ]
            )
            ->add(
                'atelier',
                CKEditorType::class,
                [
                    'label' => 'Atelier autour du spectacle',
                    'required' => false,
                ]
            )
            ->add(
                'dimensionsPlateau',
                TextType::class,
                [
                    'label' => 'Dimension du plateau',
                    'required' => false,
                ]
            )
            ->add(
                'enPratique',
                TextareaType::class,
                [
                    'label' => 'En pratique',
                    'required' => false,
                ]
            )
            ->add(
                'pays',
                TextType::class,
                [
                    'label' => 'Pays de la cie',
                    'required' => false,
                ]
            )
            ->add(
                'coproduction',
                CKEditorType::class,
                [
                    'label' => 'Coproduction',
                    'required' => false,
                ]
            )

            ->add(
                'sousCategoriePersonalise',
                TextType::class,
                [
                    'label' => 'Sous-catégorie personnalisée',
                    'required' => false,
                ]
            )

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Spectacle::class,
        ]);
    }
}
