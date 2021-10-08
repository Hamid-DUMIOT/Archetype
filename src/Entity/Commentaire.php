<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
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
    private $contenuCom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCom;

    /**
     * @ORM\ManyToOne(targetEntity=publication::class, inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $publication;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenuCom(): ?string
    {
        return $this->contenuCom;
    }

    public function setContenuCom(string $contenuCom): self
    {
        $this->contenuCom = $contenuCom;

        return $this;
    }

    public function getDateCom(): ?string
    {
        return $this->dateCom;
    }

    public function setDateCom(string $dateCom): self
    {
        $this->dateCom = $dateCom;

        return $this;
    }

    public function getPublication(): ?publication
    {
        return $this->publication;
    }

    public function setPublication(?publication $publication): self
    {
        $this->publication = $publication;

        return $this;
    }
}
