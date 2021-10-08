<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $nomContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objectContact;

    /**
     * @ORM\Column(type="text")
     */
    private $contenuContact;

    /**
     * @ORM\Column(type="date")
     */
    private $dateContact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): self
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(string $prenomContact): self
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getObjectContact(): ?string
    {
        return $this->objectContact;
    }

    public function setObjectContact(string $objectContact): self
    {
        $this->objectContact = $objectContact;

        return $this;
    }

    public function getContenuContact(): ?string
    {
        return $this->contenuContact;
    }

    public function setContenuContact(string $contenuContact): self
    {
        $this->contenuContact = $contenuContact;

        return $this;
    }

    public function getDateContact(): ?\DateTimeInterface
    {
        return $this->dateContact;
    }

    public function setDateContact(\DateTimeInterface $dateContact): self
    {
        $this->dateContact = $dateContact;

        return $this;
    }
}
