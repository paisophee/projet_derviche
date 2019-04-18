<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpectateurRepository")
 */
class Spectateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     *
     * @Assert\NotBlank(message="Le type de spectateur est obligatoire")
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Spectacle", mappedBy="spectacle")
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
            $spectacle->setIdSpectacle($this);
        }

        return $this;
    }

    public function removeSpectacle(Spectacle $spectacle): self
    {
        if ($this->spectacles->contains($spectacle)) {
            $this->spectacles->removeElement($spectacle);
            // set the owning side to null (unless already changed)
            if ($spectacle->getIdSpectacle() === $this) {
                $spectacle->setIdSpectacle(null);
            }
        }

        return $this;
    }
}
