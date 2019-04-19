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
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousCategorie;

    /**
     * @Assert\Image(mimeTypesMessage="Le fichier doit être une image",
     * maxSize="500k", maxSizeMessage="Le fichier ne doit pas faire plus de 500ko")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image1;

    /**
     * @Assert\Image(mimeTypesMessage="Le fichier doit être une image",
     * maxSize="500k", maxSizeMessage="Le fichier ne doit pas faire plus de 500ko")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @Assert\Image(mimeTypesMessage="Le fichier doit être une image",
     * maxSize="500k", maxSizeMessage="Le fichier ne doit pas faire plus de 500ko")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image3;

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
}
