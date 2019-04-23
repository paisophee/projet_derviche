<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpectacleRepository")
 */
class Spectacle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le titre est obligatoire")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom de la compagnie est obligatoire")
     */
    private $nom_cie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resume;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $site_cie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_video;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $critique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dossier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dossier_peda;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Spectateur", inversedBy="spectacles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $spectateur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Categorie", inversedBy="spectacles")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SousCategorie", inversedBy="spectacles")
     * @ORM\JoinColumn(nullable=true)
     */
    private $sousCategorie;

    /**
     * @Assert\Image(mimeTypesMessage="Le fichier doit être une image",
     * maxSize="1000k", maxSizeMessage="Le fichier ne doit pas faire plus de 1000ko")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image1;

    /**
     * @Assert\Image(mimeTypesMessage="Le fichier doit être une image",
     * maxSize="1000k", maxSizeMessage="Le fichier ne doit pas faire plus de 1000ko")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @Assert\Image(mimeTypesMessage="Le fichier doit être une image",
     * maxSize="1000k", maxSizeMessage="Le fichier ne doit pas faire plus de 1000ko")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $en_savoir_plus;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $texte_complementaire;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $en_tournee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $departement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age_spectateurs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail_contact;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $representations;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $note_mise_en_scene;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $atelier;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $dimensions_plateau;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $en_pratique;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pays;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $coproduction;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $sousCategoriePersonalise;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
    }







    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNomCie(): ?string
    {
        return $this->nom_cie;
    }

    public function setNomCie(string $nom_cie): self
    {
        $this->nom_cie = $nom_cie;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getSiteCie(): ?string
    {
        return $this->site_cie;
    }

    public function setSiteCie(?string $site_cie): self
    {
        $this->site_cie = $site_cie;

        return $this;
    }

    public function getUrlVideo(): ?string
    {
        return $this->url_video;
    }

    public function setUrlVideo(?string $url_video): self
    {
        $this->url_video = $url_video;

        return $this;
    }

    public function getCritique(): ?string
    {
        return $this->critique;
    }

    public function setCritique(?string $critique): self
    {
        $this->critique = $critique;

        return $this;
    }

    public function getDossier(): ?string
    {
        return $this->dossier;
    }

    public function setDossier(?string $dossier): self
    {
        $this->dossier = $dossier;

        return $this;
    }

    public function getDossierPeda(): ?string
    {
        return $this->dossier_peda;
    }

    public function setDossierPeda(?string $dossier_peda): self
    {
        $this->dossier_peda = $dossier_peda;

        return $this;
    }

    public function getSpectateur(): ?spectateur
    {
        return $this->spectateur;
    }

    public function setSpectateur(?spectateur $spectateur): self
    {
        $this->spectateur = $spectateur;

        return $this;
    }

    /**
     * @return Collection|categorie[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }


    public function addCategorie(categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(categorie $categorie): self
    {
        if ($this->categorie->contains($categorie)) {
            $this->categorie->removeElement($categorie);
        }

        return $this;
    }

    public function getSousCategorie(): ?sousCategorie
    {
        return $this->sousCategorie;
    }

    public function setSousCategorie(?sousCategorie $sousCategorie): self
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage1()
    {
        return $this->image1;
    }

    /**
     * @param mixed $image1
     * @return $this
     */
    public function setImage1($image1)
    {
        $this->image1 = $image1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * @param mixed $image2
     * @return $this
     */
    public function setImage2($image2)
    {
        $this->image2 = $image2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage3()
    {
        return $this->image3;
    }

    /**
     * @param mixed $image3
     * @return $this
     */
    public function setImage3($image3)
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getEnSavoirPlus(): ?string
    {
        return $this->en_savoir_plus;
    }

    public function setEnSavoirPlus(?string $en_savoir_plus): self
    {
        $this->en_savoir_plus = $en_savoir_plus;

        return $this;
    }

    public function getTexteComplementaire(): ?string
    {
        return $this->texte_complementaire;
    }

    public function setTexteComplementaire(?string $texte_complementaire): self
    {
        $this->texte_complementaire = $texte_complementaire;

        return $this;
    }

    public function getEnTournee(): ?string
    {
        return $this->en_tournee;
    }

    public function setEnTournee(?string $en_tournee): self
    {
        $this->en_tournee = $en_tournee;

        return $this;
    }

    public function getDepartement(): ?int
    {
        return $this->departement;
    }

    public function setDepartement(?int $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getAgeSpectateurs(): ?int
    {
        return $this->age_spectateurs;
    }

    public function setAgeSpectateurs(?int $age_spectateurs): self
    {
        $this->age_spectateurs = $age_spectateurs;

        return $this;
    }

    public function getMailContact(): ?string
    {
        return $this->mail_contact;
    }

    public function setMailContact(?string $mail_contact): self
    {
        $this->mail_contact = $mail_contact;

        return $this;
    }

    public function getRepresentations(): ?string
    {
        return $this->representations;
    }

    public function setRepresentations(?string $representations): self
    {
        $this->representations = $representations;

        return $this;
    }

    public function getNoteMiseEnScene(): ?string
    {
        return $this->note_mise_en_scene;
    }

    public function setNoteMiseEnScene(?string $note_mise_en_scene): self
    {
        $this->note_mise_en_scene = $note_mise_en_scene;

        return $this;
    }

    public function getAtelier(): ?string
    {
        return $this->atelier;
    }

    public function setAtelier(?string $atelier): self
    {
        $this->atelier = $atelier;

        return $this;
    }

    public function getDimensionsPlateau(): ?string
    {
        return $this->dimensions_plateau;
    }

    public function setDimensionsPlateau(?string $dimensions_plateau): self
    {
        $this->dimensions_plateau = $dimensions_plateau;

        return $this;
    }

    public function getEnPratique(): ?string
    {
        return $this->en_pratique;
    }

    public function setEnPratique(?string $en_pratique): self
    {
        $this->en_pratique = $en_pratique;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getCoproduction(): ?string
    {
        return $this->coproduction;
    }

    public function setCoproduction(?string $coproduction): self
    {
        $this->coproduction = $coproduction;

        return $this;
    }

    public function getSousCategoriePersonalise(): ?string
    {
        return $this->sousCategoriePersonalise;
    }

    public function setSousCategoriePersonalise(?string $sousCategoriePersonalise): self
    {
        $this->sousCategoriePersonalise = $sousCategoriePersonalise;

        return $this;
    }
}
