<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Entity\Spectacle;
use App\Entity\Spectateur;
use App\Repository\SpectacleRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchSpectacleType extends AbstractType
{
    private $departements;
    private $pays;

    public function __construct(SpectacleRepository $spectacleRepository)
    {
        $this->departements = $spectacleRepository->getDepartements();
        $this->pays = $spectacleRepository->getPays();
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
            ->add(
                'titre',
                TextType::class,
                [
                    'label' => 'Titre',
                    'required' => false
                ]
            )
            ->add(
                'categorie',
                EntityType::class,
                [
                    'class' => Categorie::class,
                    'label' => 'Catégorie',
                    'placeholder' => 'Toutes les catégories',
                    'choice_label' => 'type',
                    'required' => false
                ]
            )
            ->add(
                'sous_categorie',
                EntityType::class,
                [
                    'class' => SousCategorie::class,
                    'label' => 'Sous-Catégorie',
                    'placeholder' => 'Toutes les sous-catégories',
                    'choice_label' => 'type',
                    'required' => false
                ]
            )
            ->add(
                'spectateur',
                EntityType::class,
                [
                    'class' => Spectateur::class,
                    'label' => 'Public visé',
                    'placeholder' => 'Tout public',
                    'choice_label' => 'type',
                    'required' => false
                ]
            )
            ->add(
                'nom_cie',
                TextType::class,
                [
                    'label' => 'Nom de la compagnie',
                    'required' => false
                ]
            )
            ->add(
                'pays',
                ChoiceType::class,
                [
                    'label' => 'Pays',
                    'placeholder' => 'Tous les pays',
                    'required' => false,
                    'choices' => $this->pays
                ]
            )
            ->add(
                'departement',
                ChoiceType::class,
                [
                    'label' => 'Département',
                    'placeholder' => 'Tous les départements',
                    'required' => false,
                    'choices' => $this->departements
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
