<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
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
    private $nomScientifique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuDeVie;

    /**
     * @ORM\ManyToOne(targetEntity=Famille::class, inversedBy="animals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $famille;

    /**
     * @ORM\ManyToOne(targetEntity=RegimeAlimentaire::class, inversedBy="Animal")
     * @ORM\JoinColumn(nullable=false)
     */
    private $regimeAlimentaire;

    /**
     * @ORM\ManyToMany(targetEntity=Animal::class, inversedBy="predateurs")
     */
    private $predateurs;

    public function __construct()
    {
        $this->predateurs = new ArrayCollection();
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

    public function getNomScientifique(): ?string
    {
        return $this->nomScientifique;
    }

    public function setNomScientifique(?string $nomScientifique): self
    {
        $this->nomScientifique = $nomScientifique;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getLieuDeVie(): ?string
    {
        return $this->lieuDeVie;
    }

    public function setLieuDeVie(?string $lieuDeVie): self
    {
        $this->lieuDeVie = $lieuDeVie;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getRegimeAlimentaire(): ?RegimeAlimentaire
    {
        return $this->regimeAlimentaire;
    }

    public function setRegimeAlimentaire(?RegimeAlimentaire $regimeAlimentaire): self
    {
        $this->regimeAlimentaire = $regimeAlimentaire;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getPredateurs(): Collection
    {
        return $this->predateurs;
    }

    public function addPredateur(self $predateur): self
    {
        if (!$this->predateurs->contains($predateur)) {
            $this->predateurs[] = $predateur;
        }

        return $this;
    }

    public function removePredateur(self $predateur): self
    {
        $this->predateurs->removeElement($predateur);

        return $this;
    }
}
