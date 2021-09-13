<?php

namespace App\Entity;

use App\Repository\RegimeAlimentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegimeAlimentaireRepository::class)
 */
class RegimeAlimentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Animal::class, mappedBy="regimeAlimentaire")
     */
    private $Animal;

    public function __construct()
    {
        $this->Animal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Animal[]
     */
    public function getAnimal(): Collection
    {
        return $this->Animal;
    }

    public function addAnimal(Animal $animal): self
    {
        if (!$this->Animal->contains($animal)) {
            $this->Animal[] = $animal;
            $animal->setRegimeAlimentaire($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): self
    {
        if ($this->Animal->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getRegimeAlimentaire() === $this) {
                $animal->setRegimeAlimentaire(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
    }


}
