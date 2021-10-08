<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 */
class Offre
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
    private $nomOffre;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOffrePub;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionOffre;

    /**
     * @ORM\OneToMany(targetEntity=ReponseOffre::class, mappedBy="offre", orphanRemoval=true)
     */
    private $reponseOffre;

    public function __construct()
    {
        $this->reponseOffre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOffre(): ?string
    {
        return $this->nomOffre;
    }

    public function setNomOffre(string $nomOffre): self
    {
        $this->nomOffre = $nomOffre;

        return $this;
    }

    public function getDateOffrePub(): ?\DateTimeInterface
    {
        return $this->dateOffrePub;
    }

    public function setDateOffrePub(\DateTimeInterface $dateOffrePub): self
    {
        $this->dateOffrePub = $dateOffrePub;

        return $this;
    }

    public function getDescriptionOffre(): ?string
    {
        return $this->descriptionOffre;
    }

    public function setDescriptionOffre(string $descriptionOffre): self
    {
        $this->descriptionOffre = $descriptionOffre;

        return $this;
    }

    /**
     * @return Collection|reponseOffre[]
     */
    public function getReponseOffre(): Collection
    {
        return $this->reponseOffre;
    }

    public function addReponseOffre(reponseOffre $reponseOffre): self
    {
        if (!$this->reponseOffre->contains($reponseOffre)) {
            $this->reponseOffre[] = $reponseOffre;
            $reponseOffre->setOffre($this);
        }

        return $this;
    }

    public function removeReponseOffre(reponseOffre $reponseOffre): self
    {
        if ($this->reponseOffre->removeElement($reponseOffre)) {
            // set the owning side to null (unless already changed)
            if ($reponseOffre->getOffre() === $this) {
                $reponseOffre->setOffre(null);
            }
        }

        return $this;
    }
}
