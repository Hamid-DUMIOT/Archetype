<?php

namespace App\Entity;

use App\Repository\ReponseOffreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponseOffreRepository::class)
 */
class ReponseOffre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $contenuReponse;

    /**
     * @ORM\ManyToOne(targetEntity=Offre::class, inversedBy="reponseOffre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $offre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenuReponse(): ?string
    {
        return $this->contenuReponse;
    }

    public function setContenuReponse(string $contenuReponse): self
    {
        $this->contenuReponse = $contenuReponse;

        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): self
    {
        $this->offre = $offre;

        return $this;
    }
}
