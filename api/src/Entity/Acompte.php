<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AcompteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcompteRepository::class)]
#[ApiResource]
class Acompte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $dateAcompte;

    #[ORM\Column(type: 'float')]
    private $mantant;

    #[ORM\ManyToOne(targetEntity: Facture::class, inversedBy: 'acomptes')]
    #[ORM\JoinColumn(nullable: false)]
    private $idFacture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAcompte(): ?\DateTimeInterface
    {
        return $this->dateAcompte;
    }

    public function setDateAcompte(\DateTimeInterface $dateAcompte): self
    {
        $this->dateAcompte = $dateAcompte;

        return $this;
    }

    public function getMantant(): ?float
    {
        return $this->mantant;
    }

    public function setMantant(float $mantant): self
    {
        $this->mantant = $mantant;

        return $this;
    }

    public function getIdFacture(): ?Facture
    {
        return $this->idFacture;
    }

    public function setIdFacture(?Facture $idFacture): self
    {
        $this->idFacture = $idFacture;

        return $this;
    }
}
