<?php

namespace App\Entity;

use App\Repository\ActualiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActualiteRepository::class)
 */
class Actualite
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
    private $nomActu;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionActu;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="actualite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="actualite")
     * @ORM\JoinColumn(nullable=false)
     */


    public function getNomActu(): ?string
    {
        return $this->nomActu;
    }

    public function setNomActu(string $nomActu): self
    {
        $this->nomActu = $nomActu;

        return $this;
    }

    public function getDescriptionActu(): ?string
    {
        return $this->descriptionActu;
    }

    public function setDescriptionActu(string $descriptionActu): self
    {
        $this->descriptionActu = $descriptionActu;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
