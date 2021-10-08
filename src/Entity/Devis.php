<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DevisRepository::class)
 */
class Devis
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
    private $libelleDevis;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantDevis;

    /**
     * @ORM\ManyToOne(targetEntity=Projet::class, inversedBy="devis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleDevis(): ?string
    {
        return $this->libelleDevis;
    }

    public function setLibelleDevis(string $libelleDevis): self
    {
        $this->libelleDevis = $libelleDevis;

        return $this;
    }

    public function getMontantDevis(): ?int
    {
        return $this->montantDevis;
    }

    public function setMontantDevis(int $montantDevis): self
    {
        $this->montantDevis = $montantDevis;

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }
}
