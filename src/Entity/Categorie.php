<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
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
     * @Assert\NotBlank(message="Le choix de la catégorie est obligatoire")
     */
    private $type;

    /**
     * Validation de l'image
     * @Assert\Image(mimeTypesMessage="Le fichier doit être une image",
     * maxSize="200k", maxSizeMessage="Le fichier ne doit pas faire plus de 200ko")
     * @ORM\Column(type="string", nullable=false)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Spectacle", mappedBy="spectacle")
     */
    private $spectacles;



    public function __construct()
    {
        $this->spectacles = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return Categorie
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function __toString()
    {
        return $this->type;
    }

    /**
     * @return Collection|Spectacle[]
     */
    public function getSpectacles(): Collection
    {
        return $this->spectacles;
    }

    public function addSpectacle(Spectacle $spectacle): self
    {
        if (!$this->spectacles->contains($spectacle)) {
            $this->spectacles[] = $spectacle;
            $spectacle->addSpectacle($this);
        }

        return $this;
    }

    public function removeSpectacle(Spectacle $spectacle): self
    {
        if ($this->spectacles->contains($spectacle)) {
            $this->spectacles->removeElement($spectacle);
            $spectacle->removeSpectacle($this);
        }

        return $this;
    }

}
