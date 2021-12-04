<?php

namespace App\Entity;

use App\Repository\TypeOffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeOffreRepository::class)
 */
class TypeOffre
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
    private $nom_type_offre;

    /**
     * @ORM\OneToMany(targetEntity=Offre::class, mappedBy="typeoffre")
     */
    private $offres;

    public function __construct()
    {
        $this->offres = new ArrayCollection();
    }

    public function __toString()
    {
        return  $this->getNomTypeOffre();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeOffre(): ?string
    {
        return $this->nom_type_offre;
    }

    public function setNomTypeOffre(string $nom_type_offre): self
    {
        $this->nom_type_offre = $nom_type_offre;

        return $this;
    }

    /**
     * @return Collection|Offre[]
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(Offre $offre): self
    {
        if (!$this->offres->contains($offre)) {
            $this->offres[] = $offre;
            $offre->setTypeoffre($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): self
    {
        if ($this->offres->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getTypeoffre() === $this) {
                $offre->setTypeoffre(null);
            }
        }

        return $this;
    }
}
