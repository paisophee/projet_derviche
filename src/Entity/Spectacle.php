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
     *
     * @Assert\NotBlank(message="Le titre est obligatoire")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=60)
     *
     * @Assert\NotBlank(message="Le nom de la compagnie est obligatoire")
     */
    private $nom_cie;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank(message="Le résumé est obligatoire")
     */
    private $resume;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank(message="La durée est obligatoire")
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $site_cie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_video;

    /**
     * @ORM\Column(type="text")
     */
    private $critique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dossier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dossier_peda;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Spectateur", inversedBy="spectacles")
     */
    private $id_spectateur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Categorie", inversedBy="spectacles")
     */
    private $id_categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SousCategorie", inversedBy="spectacles")
     */
    private $id_sousCategorie;


        /***************** FONCTION CONSTRUCT *********************/

    public function __construct()
    {
        $this->id_categorie = new ArrayCollection();
    }


        /******************* GETTER/SETTER **********************/

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

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getSiteCie(): ?string
    {
        return $this->site_cie;
    }

    public function setSiteCie(string $site_cie): self
    {
        $this->site_cie = $site_cie;

        return $this;
    }

    public function getUrlVideo(): ?string
    {
        return $this->url_video;
    }

    public function setUrlVideo(string $url_video): self
    {
        $this->url_video = $url_video;

        return $this;
    }

    public function getCritique(): ?string
    {
        return $this->critique;
    }

    public function setCritique(string $critique): self
    {
        $this->critique = $critique;

        return $this;
    }

    public function getDossier(): ?string
    {
        return $this->dossier;
    }

    public function setDossier(string $dossier): self
    {
        $this->dossier = $dossier;

        return $this;
    }

    public function getDossierPeda(): ?string
    {
        return $this->dossier_peda;
    }

    public function setDossierPeda(string $dossier_peda): self
    {
        $this->dossier_peda = $dossier_peda;

        return $this;
    }

    public function getIdSpectateur(): ?Spectateur
    {
        return $this->id_spectateur;
    }

    public function setIdSpectateur(?Spectateur $id_spectateur): self
    {
        $this->id_spectateur = $id_spectateur;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getIdCategorie(): Collection
    {
        return $this->id_categorie;
    }

    public function addIdCategorie(Categorie $idCategorie): self
    {
        if (!$this->id_categorie->contains($idCategorie)) {
            $this->id_categorie[] = $idCategorie;
        }

        return $this;
    }

    public function removeIdCategorie(Categorie $idCategorie): self
    {
        if ($this->id_categorie->contains($idCategorie)) {
            $this->id_categorie->removeElement($idCategorie);
        }

        return $this;
    }

    public function getIdSousCategorie(): ?SousCategorie
    {
        return $this->id_sousCategorie;
    }

    public function setIdSousCategorie(?SousCategorie $id_sousCategorie): self
    {
        $this->id_sousCategorie = $id_sousCategorie;

        return $this;
    }
}
